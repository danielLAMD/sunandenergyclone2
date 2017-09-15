<?php
defined('ABSPATH') or die();

/**
 * @package WordPress
 * @subpackage Hue
 */

$type=esc_attr(trim($_GET['type'] ));
$errors = array();
if ( !empty($_POST) ) {
	$return = detheme_configuration_form_handler($type);
	if ( is_string($return) )
		return $return;
	if ( is_array($return) )
		$errors = $return;
}

return detheme_popup_configuration_form($type,$errors);

function detheme_configuration_form_handler($type){

	switch($type){
		case 'button':
		$text=esc_attr($_POST['text']);
		$style=esc_attr($_POST['style']);
		$url=esc_url($_POST['url']);
		$size=esc_attr($_POST['size']);
		$target=esc_attr($_POST['target']);
		$skin=esc_attr($_POST['skin']);

		if(!empty($text)){
			
			$errors=detheme_popup_send_to_editor(array('type'=>$type,'style'=>$style,'text'=>$text,'url'=>$url,'size'=>$size,'target'=>$target,'skin'=>$skin));
		}
		else{
			
			$errors=array('errors'=>array('style'=>$style,'text'=>$text,'url'=>$url,'size'=>$size,'target'=>$target,'skin'=>$skin));
		}
		break;	
		case 'icon':
		$icon=esc_attr($_POST['icon']);
		$size=esc_attr($_POST['size']);
		$color=esc_attr($_POST['color']);
		$style=esc_attr($_POST['style']);

		if(count($icon)){
			
			$errors=detheme_popup_send_to_editor(array('type'=>$type,'icon'=>$icon,'size'=>$size,$icon,'color'=>$color,$icon,'style'=>$style));
		}
		else{
			
			$errors=array('errors'=>array('icon'=>$icon,'size'=>$size,$icon,'color'=>$color,$icon,'style'=>$style));
		}
		break;
		case 'counto':
		$number=intval($_POST['number']);
		$sepcolor=esc_attr($_POST['sepcolor']);

		if(!empty($number)){
			$errors=detheme_popup_send_to_editor(array('type'=>$type,'number'=>$number,'sepcolor'=>$sepcolor));
		}
		else{
			
			$errors=array('errors'=>array('number'=>$number,'sepcolor'=>$sepcolor));
		}
		break;
		default:
		break;
	}
	return $errors;
}

function detheme_ajax_load_script(){

	wp_dequeue_script('installer-admin');

	wp_enqueue_style( 'popup-style',get_template_directory_uri() . '/lib/css/popup.css', array(), null, 'all' );
	wp_enqueue_script( 'icon-picker',get_template_directory_uri() . '/lib/js/icon_picker.js', array('jquery'),null);
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), null );	
	wp_enqueue_style( 'icon_picker-font',get_template_directory_uri() . '/lib/css/fontello.css', array(), null, 'all' );
	wp_enqueue_style( 'wp-color-picker' );
   	wp_localize_script( 'icon-picker', 'picker_i18nLocale', array(
      'search_icon'=>esc_html__('Search Icon','hue'),
    ) );
}



function detheme_popup_configuration_form($type,$errors=array()){

	add_action( 'wp_enqueue_scripts','detheme_ajax_load_script');

	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php wp_head();?>
	</head>
	<body>
		<div id="jayd-popup">
			<div id="jayd-shortcode-wrap">
				<div id="jayd-sc-form-wrap">
					<div id="jayd-sc-form-head"><h2>DT <?php print ucwords($type);?></h2></div>
					<form method="post" action="" id="jayd-sc-form">
						<table cellspacing="2" cellpadding="5" id="jayd-sc-form-table" class="form-table">
							<tbody>
								<?php 
								if($type=='button'){

									$styles=array(
										'color-primary'=>esc_html__('Primary','hue'),
										'color-secondary' => esc_html__('Secondary','hue'),
										/*
										'success' => esc_html__('Success','hue'),
										'info' => esc_html__('Info','hue'),
										'warning' => esc_html__('Warning','hue'),
										'danger'=>esc_html__('Danger','hue'),
										*/
										'ghost'=>esc_html__('Ghost Button','hue'),
										'link'=>esc_html__('Link','hue'),
										'underlined'=>esc_html__('Underlined','hue'),
										'rounded'=>esc_html__('Rounded','hue'),
										);

									$sizes = array(
										'btn-lg' => esc_html__('Large','hue'),
										'btn-default' => esc_html__('Default','hue'),
										'btn-sm' => esc_html__('Small','hue'),
										'btn-xs' => esc_html__('Extra small','hue')
										);

									$errors=wp_parse_args($errors,array('size'=>'','url'=>'','style'=>'','target'=>'','text'=>'','skin'=>'dark'));

									?>
									<tr>
										<td><label><?php esc_html_e('Button URL','hue');?></label></td>
										<td><input class="form-control" type="text" maxlength="100" name="url" id="url" class="jayd-form-input" value="<?php print $errors['url'];?>" /> 
											<span class="child-clone-row-desc"><?php esc_html_e('Add the button\'s url eg http://example.com','hue');?></span>
										</td>
									</tr>
									<tr>
										<td><label><?php esc_html_e("Button skin", 'hue');?></label></td>
										<td>
										<select class="jayd-form-select form-control" name="skin" id="skin">
										<option value="dark" <?php echo(($errors['skin']=='dark')?" selected=\"selected\"":"");?>><?php esc_html_e('Dark (default)','hue');?></option> 
										<option value="light" <?php echo(($errors['skin']=='light')?" selected=\"selected\"":"");?>><?php esc_html_e('Light','hue');?></option> 
										</select>
										<span class="child-clone-row-desc"><?php esc_html_e('Select the button\'s skin','hue');?></span> 
										</td>
									</tr>
									<tr>
										<td><label><?php esc_html_e("Button style", 'hue');?></label></td>
										<td>
										<select class="jayd-form-select form-control" name="style" id="style">
											<?php 	
											if($styles){

												foreach ( $styles as $style=>$label ){

													echo "<option value=\"".$style."\" ".(($style==$errors['style'])?" selected=\"selected\"":"").">".$label."</option>"; 
												}
											}
											?>

										</select> 
										<span class="child-clone-row-desc"><?php esc_html_e('Select the button\'s style, ie the button\'s colour','hue');?></span>
										</td>
									</tr>
								<tr>
									<td><label><?php esc_html_e("Button size", 'hue');?></label></td>
									<td><select class="jayd-form-select form-control" name="size" id="size">
										<?php 	
										if($sizes){

											foreach ( $sizes as $size=>$label ){

												echo "<option value=\"".$size."\" ".(($size==$errors['size'])?" selected=\"selected\"":"").">".$label."</option>"; 
											}
										}
										?>

									</select> <span class="child-clone-row-desc">Select the icon's size</span></td>
								</tr>
								<tr>
									<td><label><?php esc_html_e('Button Target','hue');?></label></td>
									<td><select class="jayd-form-select form-control" name="target" id="t	arget">
										<option value="_self" <?php echo(($errors['target']=='_self')?" selected=\"selected\"":"");?>><?php esc_html_e('Self','hue');?></option> 
										<option value="_blank" <?php echo(($errors['target']=='_blank')?" selected=\"selected\"":"");?>><?php esc_html_e('Blank','hue');?></option> 
									</select> <span class="child-clone-row-desc"><?php esc_html_e('Select the button\'s target','hue');?></span></td>
								</tr>
								<tr>
									<td><label><?php esc_html_e('Button Text','hue');?></label></td>
									<td><input class="form-control" type="text" name="text" maxlength="100" id="text" class="jayd-form-input" value="<?php print $errors['text'];?>"/> 
										<span class="child-clone-row-desc"><?php esc_html_e('Select the button\'s text','hue');?></span></td>
									</tr>

									<?php }
									elseif($type=='counto'){

								
									$errors=wp_parse_args($errors,array('number'=>'100','sepcolor'=>''));
								?>
								<tr>
									<td><label><?php esc_html_e('Number','hue');?></label></td>
									<td><input class="form-control" type="text" name="number" maxlength="100" id="number" class="jayd-form-input" value="<?php print $errors['number'];?>"/> 
										<span class="child-clone-row-desc"><?php esc_html_e('The value must be numeric','hue');?></span></td>
								</tr>
								<tr>
									<td><label><?php esc_html_e('Separator Color','hue');?></label></td>
									<td><input class="form-control wp-color-picker" type="text" name="sepcolor" id="sepcolor" class="jayd-form-input" value="<?php print $errors['sepcolor'];?>"/> 
								</tr>

									<?php }
									elseif($type=='icon'){

										$icons=(function_exists('detheme_font_list'))?detheme_font_list():apply_filters('detheme_font_list',array());

										$sizes = array(
											'' => esc_html__('Default','hue'),
											'size-sm' => esc_html__('Small','hue'),
											'size-md' => esc_html__('Medium','hue'),
											'size-lg' => esc_html__('Large','hue')
											);

										$errors=wp_parse_args($errors,array('size'=>'','color'=>'','style'=>'square'));

										?>
										<tr>
											<td><label><?php esc_html_e('Icon Size','hue');?></label></td>
											<td><select class="form-control jayd-form-select" name="size" id="size">
												<?php 

												if($sizes){

													foreach ( $sizes as $size=>$label ){

														echo "<option value=\"".$size."\" ".(($size==$errors['size'])?" selected=\"selected\"":"").">".$label."</option>"; 
													}
												}
												?>

											</select> <span class="child-clone-row-desc"><?php esc_html_e("Select the button's size",'hue');?></span></td>
										</tr>
										<tr>
											<td><label><?php esc_html_e('Icon Color','hue');?></label></td>
											<td><select class="jayd-form-select form-control" name="color" id="color">
												<option value="" <?php echo(($errors['color']=='')?" selected=\"selected\"":"");?>><?php esc_html_e('Default','hue');?></option> 
												<option value="primary" <?php echo(($errors['color']=='primary')?" selected=\"selected\"":"");?>><?php esc_html_e('Primary','hue');?></option> 
												<option value="secondary" <?php echo(($errors['color']=='secondary')?" selected=\"selected\"":"");?>><?php esc_html_e('Secondary','hue');?></option> 
											</select> <span class="child-clone-row-desc"><?php esc_html_e('Select the button\'s color','hue');?></span></td>
										</tr>
										<tr>
											<td><label><?php esc_html_e('Icon Style','hue');?></label></td>
											<td><select class="jayd-form-select form-control" name="style" id="style">
												<option value=""><?php esc_html_e('None','hue');?></option> 
												<option value="circle" <?php echo(($errors['style']=='circle')?" selected=\"selected\"":"");?>><?php esc_html_e('Circle','hue');?></option> 
												<option value="square" <?php echo(($errors['style']=='square')?" selected=\"selected\"":"");?>><?php esc_html_e('Square','hue');?></option> 
												<option value="ghost" <?php echo(($errors['style']=='ghost')?" selected=\"selected\"":"");?>><?php esc_html_e('Ghost','hue');?></option> 
												</select> <span class="child-clone-row-desc"><?php esc_html_e('Select the button\'s style','hue');?></span></td>
											</tr>

											<tr>
											<td><label><?php esc_html_e('Icon','hue');?></label></td>
											<td><?php if(count($icons)):?>
						                          <script type="text/javascript">
						                          jQuery(document).ready(function($){

						                            var options={
						                              icons:new Array('<?php print @implode("','",$icons);?>')
						                            };

						                            $(".icon-picker").iconPicker(options);
						                          });

						                          </script>

													<input type="text" class="icon-picker" id="icon" name="icon" value="" />
												<?php endif;?>
											</td>
										</tr>
										<?php }
										?>
									</tbody>
								</table>
								<br/>
								<center>
									<input type="submit" id="form-insert" class="btn btn-default content_jayd_button" value="<?php esc_html_e('Insert Shortcode','hue');?>">
								</center>
						</form>
					</div>
				</div>
			</div>
		</body>
		</html>
		<?php }

		function detheme_popup_send_to_editor($options=array()) {

			$string="";

			switch ($options['type']){
				case 'button':	$string="[dt_button url=\"".$options['url']."\" style=\"".$options['style']."\" size=\"".$options['size']."\" skin=\"".$options['skin']."\" target=\"".$options['target']."\"]".$options['text']."[/dt_button]";
				break;
				case 'counto':	$string="[dt_counto to=\"".$options['number']."\"".
				((!empty($options['sepcolor']))?" sepcolor=\"".esc_attr($options['sepcolor'])."\"":"").
				"]".$options['number']."[/dt_counto]";
				break;
				case 'icon':
				$string.="[dticon ico=\"".$options['icon']."\"".
				((!empty($options['size']))?" size=\"".$options['size']."\"":"").
				((!empty($options['color']))?" color=\"".$options['color']."\"":"").
				((!empty($options['style']))?" style=\"".$options['style']."\"":"")."][/dticon]";
				break;

			}
			$string=preg_replace("/\r\n|\n|\r/","<br/>",$string);

			?>
			<script type="text/javascript">

			/* <![CDATA[ */
			var win = window.dialogArguments || opener || parent || top;
			if(win.tinyMCE)
			{

				win.send_to_editor('<?php echo addslashes($string); ?>');
win.tb_remove();
}
else if(win.send_to_editor)
{
	win.send_to_editor('<?php echo addslashes($string); ?>');
	win.tb_remove();
}


/* ]]> */
</script>
<?php
exit;
}
?>
