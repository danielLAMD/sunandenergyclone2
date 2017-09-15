<?php
defined('ABSPATH') or die();
/**
 *
 * @package revslider
 * @subpackage Importer
 */

/**
 * WordPress Importer class for managing parsing of WXR files.
 */

class RevSliderImporter extends RevSlider {

		public function importSliderFromFile($filepath,$updateAnim = true, $updateStatic = true){
			
			try{
 					
				$wp_filesystem=new WP_Filesystem_Direct(array());

				$sliderID = UniteFunctionsRev::getPostVariable("sliderid");
				$sliderExists = !empty($sliderID);
				
				if($sliderExists)
					$this->initByID($sliderID);
					
				if($wp_filesystem->exists($filepath) == false)
					UniteFunctionsRev::throwError("Import file not found!!!");
				
				//check if zip file or fallback to old, if zip, check if all files exist

				if(!class_exists("ZipArchive")){
					$importZip = false;
				}else{
					$zip = new ZipArchive;
					$importZip = $zip->open($filepath, ZIPARCHIVE::CREATE);
				}

				if($importZip === true){ //true or integer. If integer, its not a correct zip file
					
					//check if files all exist in zip
					$slider_export = $zip->getStream('slider_export.txt');
					$custom_animations = $zip->getStream('custom_animations.txt');
					$dynamic_captions = $zip->getStream('dynamic-captions.css');
					$static_captions = $zip->getStream('static-captions.css');
					
					if(!$slider_export)  UniteFunctionsRev::throwError("slider_export.txt does not exist!");
					
					$content = '';
					$animations = '';
					$dynamic = '';
					$static = '';

					while (!feof($slider_export)) $content .= @fread($slider_export,1024);

					while (!feof($slider_export)) $content .= $wp_filesystem->fread($slider_export);
					if($custom_animations){ while (!feof($custom_animations)) $animations .= @fread($custom_animations,1024); }
					if($dynamic_captions){ while (!feof($dynamic_captions)) $dynamic .= @fread($dynamic_captions,1024); }
					if($static_captions){ while (!feof($static_captions)) $static .= @fread($static_captions,1024); }

					@fclose($slider_export);

					if($custom_animations){ @fclose($custom_animations); }
					if($dynamic_captions){ @fclose($dynamic_captions); }
					if($static_captions){ @fclose($static_captions); }
				}else{ 
					$content = $wp_filesystem->get_contents($filepath);
				}
				
				if($importZip === true){ //we have a zip
					$db = new UniteDBRev();
					
					//update/insert custom animations
					$animations = @unserialize($animations);
					if(!empty($animations)){
						foreach($animations as $key => $animation){ //$animation['id'], $animation['handle'], $animation['params']
							$exist = $db->fetch(GlobalsRevSlider::$table_layer_anims, "handle = '".$animation['handle']."'");
							if(!empty($exist)){ //update the animation, get the ID
								if($updateAnim == "true"){ //overwrite animation if exists
									$arrUpdate = array();
									$arrUpdate['params'] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
									$db->update(GlobalsRevSlider::$table_layer_anims, $arrUpdate, array('handle' => $animation['handle']));
									
									$id = $exist['0']['id'];
								}else{ //insert with new handle
									$arrInsert = array();
									$arrInsert["handle"] = 'copy_'.$animation['handle'];
									$arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
									
									$id = $db->insert(GlobalsRevSlider::$table_layer_anims, $arrInsert);
								}
							}else{ //insert the animation, get the ID
								$arrInsert = array();
								$arrInsert["handle"] = $animation['handle'];
								$arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
								
								$id = $db->insert(GlobalsRevSlider::$table_layer_anims, $arrInsert);
							}
							
							//and set the current customin-oldID and customout-oldID in slider params to new ID from $id
							$content = str_replace(array('customin-'.$animation['id'], 'customout-'.$animation['id']), array('customin-'.$id, 'customout-'.$id), $content);	
						}
						dmp(esc_html__("animations imported!",'provolio'));
					}

					//overwrite/append static-captions.css
					if(!empty($static)){
						if($updateStatic == "true"){ //overwrite file
							RevOperations::updateStaticCss($static);
						}else{ //append
							$static_cur = RevOperations::getStaticCss();
							$static = $static_cur."\n".$static;
							RevOperations::updateStaticCss($static);
						}
					}
					//overwrite/create dynamic-captions.css
					//parse css to classes
					$dynamicCss = UniteCssParserRev::parseCssToArray($dynamic);
					
					if(is_array($dynamicCss) && $dynamicCss !== false && count($dynamicCss) > 0){
						foreach($dynamicCss as $class => $styles){
							//check if static style or dynamic style
							$class = trim($class);
							
							if((strpos($class, ':hover') === false && strpos($class, ':') !== false) || //before, after
								strpos($class," ") !== false || // .tp-caption.imageclass img or .tp-caption .imageclass or .tp-caption.imageclass .img
								strpos($class,".tp-caption") === false || // everything that is not tp-caption
								(strpos($class,".") === false || strpos($class,"#") !== false) || // no class -> #ID or img
								strpos($class,">") !== false){ //.tp-caption>.imageclass or .tp-caption.imageclass>img or .tp-caption.imageclass .img
								continue;
							}
							
							//is a dynamic style
							if(strpos($class, ':hover') !== false){
								$class = trim(str_replace(':hover', '', $class));
								$arrInsert = array();
								$arrInsert["hover"] = json_encode($styles);
								$arrInsert["settings"] = json_encode(array('hover' => 'true'));
							}else{
								$arrInsert = array();
								$arrInsert["params"] = json_encode($styles);
							}
							//check if class exists
							$result = $db->fetch(GlobalsRevSlider::$table_css, "handle = '".$class."'");
							
							if(!empty($result)){ //update
								$db->update(GlobalsRevSlider::$table_css, $arrInsert, array('handle' => $class));
							}else{ //insert
								$arrInsert["handle"] = $class;
								$db->insert(GlobalsRevSlider::$table_css, $arrInsert);
							}
						}
						dmp(esc_html__("dynamic styles imported!",'provolio'));
					}
				}
				
				//$content = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $content); //deprecated
				$content = preg_replace_callback('!s:(\d+):"(.*?)";!', array('RevSliderSlider', 'clear_error_in_string') , $content); //clear errors in string
				
				$arrSlider = @unserialize($content);
					if(empty($arrSlider))
						 UniteFunctionsRev::throwError("Wrong export slider file format! This could be caused because the ZipArchive extension is not enabled.");
					
				//update slider params
				$sliderParams = $arrSlider["params"];
				
				if($sliderExists){					
					$sliderParams["title"] = $this->arrParams["title"];
					$sliderParams["alias"] = $this->arrParams["alias"];
					$sliderParams["shortcode"] = $this->arrParams["shortcode"];
				}
				
				if(isset($sliderParams["background_image"]))
					$sliderParams["background_image"] = UniteFunctionsWPRev::getImageUrlFromPath($sliderParams["background_image"]);
				
				$json_params = json_encode($sliderParams);
				
				//update slider or create new
				if($sliderExists){
					$arrUpdate = array("params"=>$json_params);	
					$this->db->update(GlobalsRevSlider::$table_sliders,$arrUpdate,array("id"=>$sliderID));
				}else{	//new slider
					$arrInsert = array();
					$arrInsert["params"] = $json_params;
					$arrInsert["title"] = UniteFunctionsRev::getVal($sliderParams, "title","Slider1");
					$arrInsert["alias"] = UniteFunctionsRev::getVal($sliderParams, "alias","slider1");	
					$sliderID = $this->db->insert(GlobalsRevSlider::$table_sliders,$arrInsert);
				}
				
				//-------- Slides Handle -----------
				
				//delete current slides
				if($sliderExists)
					$this->deleteAllSlides();
				
				//create all slides
				$arrSlides = $arrSlider["slides"];
				
				$alreadyImported = array();
				
				foreach($arrSlides as $slide){
					
					$params = $slide["params"];
					$layers = $slide["layers"];
					
					//convert params images:
					if(isset($params["image"])){
						//import if exists in zip folder
						if(strpos($params["image"], 'http') !== false){
						}else{
							if(trim($params["image"]) !== ''){
								if($importZip === true){ //we have a zip, check if exists
									$image = $zip->getStream('images/'.$params["image"]);
									if($image){
										if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]])){
											$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$params["image"], $sliderParams["alias"].'/');

											if($importImage !== false){
												$alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]] = $importImage['path'];
												
												$params["image"] = $importImage['path'];
											}
										}else{
											$params["image"] = $alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]];
										}


									}
								}
							}
							$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
						}
					}
					
					//convert layers images:
					foreach($layers as $key=>$layer){					
						if(isset($layer["image_url"])){
							//import if exists in zip folder
							if(trim($layer["image_url"]) !== ''){
								if(strpos($layer["image_url"], 'http') !== false){
								}else{
									if($importZip === true){ //we have a zip, check if exists
										$image_url = $zip->getStream('images/'.$layer["image_url"]);
										if($image_url){
											if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]])){
												$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$layer["image_url"], $sliderParams["alias"].'/');
												
												if($importImage !== false){
													$alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]] = $importImage['path'];
													
													$layer["image_url"] = $importImage['path'];
												}
											}else{
												$layer["image_url"] = $alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]];
											}
										}
									}
								}
							}
							$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
							$layers[$key] = $layer;
						}
					}
					
					//create new slide
					$arrCreate = array();
					$arrCreate["slider_id"] = $sliderID;
					$arrCreate["slide_order"] = $slide["slide_order"];
					
					$my_layers = json_encode($layers);
					if(empty($my_layers))
						$my_layers = stripslashes(json_encode($layers));
					$my_params = json_encode($params);
					if(empty($my_params))
						$my_params = stripslashes(json_encode($params));
						
						
					$arrCreate["layers"] = $my_layers;
					$arrCreate["params"] = $my_params;
					
					$this->db->insert(GlobalsRevSlider::$table_slides,$arrCreate);									
				}
				
				//check if static slide exists and import
				if(isset($arrSlider['static_slides']) && !empty($arrSlider['static_slides'])){
					$static_slide = $arrSlider['static_slides'];
					foreach($static_slide as $slide){
						
						$params = $slide["params"];
						$layers = $slide["layers"];
						
						//convert params images:
						if(isset($params["image"])){
							//import if exists in zip folder
							if(strpos($params["image"], 'http') !== false){
							}else{
								if(trim($params["image"]) !== ''){
									if($importZip === true){ //we have a zip, check if exists
										$image = $zip->getStream('images/'.$params["image"]);
										if($image){
											if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]])){
												$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$params["image"], $sliderParams["alias"].'/');

												if($importImage !== false){
													$alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]] = $importImage['path'];
													
													$params["image"] = $importImage['path'];
												}
											}else{
												$params["image"] = $alreadyImported['zip://'.$filepath."#".'images/'.$params["image"]];
											}


										}
									}
								}
								$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
							}
						}
						
						//convert layers images:
						foreach($layers as $key=>$layer){					
							if(isset($layer["image_url"])){
								//import if exists in zip folder
								if(trim($layer["image_url"]) !== ''){
									if(strpos($layer["image_url"], 'http') !== false){
									}else{
										if($importZip === true){ //we have a zip, check if exists
											$image_url = $zip->getStream('images/'.$layer["image_url"]);
											if($image_url){
												if(!isset($alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]])){
													$importImage = UniteFunctionsWPRev::import_media('zip://'.$filepath."#".'images/'.$layer["image_url"], $sliderParams["alias"].'/');
													
													if($importImage !== false){
														$alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]] = $importImage['path'];
														
														$layer["image_url"] = $importImage['path'];
													}
												}else{
													$layer["image_url"] = $alreadyImported['zip://'.$filepath."#".'images/'.$layer["image_url"]];
												}
											}
										}
									}
								}
								$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
								$layers[$key] = $layer;
							}
						}
						
						//create new slide
						$arrCreate = array();
						$arrCreate["slider_id"] = $sliderID;
						
						$my_layers = json_encode($layers);
						if(empty($my_layers))
							$my_layers = stripslashes(json_encode($layers));
						$my_params = json_encode($params);
						if(empty($my_params))
							$my_params = stripslashes(json_encode($params));
							
							
						$arrCreate["layers"] = $my_layers;
						$arrCreate["params"] = $my_params;
						
						if($sliderExists){
							unset($arrCreate["slider_id"]);
							$this->db->update(GlobalsRevSlider::$table_static_slides,$arrCreate,array("slider_id"=>$sliderID));
						}else{
							$this->db->insert(GlobalsRevSlider::$table_static_slides,$arrCreate);									
						}
					}
				}
				
			}catch(Exception $e){
				$errorMessage = $e->getMessage();
				return(array("success"=>false,"error"=>$errorMessage,"sliderID"=>$sliderID));
			}
			
			//update dynamic-captions.css
			//RevOperations::updateDynamicCaptions();
			
			return(array("success"=>true,"sliderID"=>$sliderID));
		}
}
?>