<?php
defined('ABSPATH') or die();
/* 
 * Plugin Name: Hue Icon Font - Add-on
 * Plugin URI: http://detheme.com
 * Description: Add icon font for Hue WP Theme by detheme.
 * Version: 1.0.0
 * Author: support@detheme.com
 * Author URI: http://detheme.com
 * Domain Path: /languages/
 *
 */
add_action('init','init_provolio_icons');

function init_provolio_icons(){
	add_filter('detheme_get_icon_types','get_provolio_icons');
}

function get_provolio_icons($packages){


	$path= dirname(__FILE__)."/iconfonts/";
	$wp_filesystem=new WP_Filesystem_Direct(array());

		if($dirlist=$wp_filesystem->dirlist($path)){
		    foreach ($dirlist as $dirname => $dirattr) {

		       if($dirattr['type']!='d')
		       		continue;

		       	if(!$dirfont=$wp_filesystem->dirlist($path.$dirname."/"))
		       		continue;


		       	foreach ($dirfont as $filename => $fileattr) {
	              if(preg_match("/(\.css)$/", $filename)){
	              	$package['css']=$filename;
	                break;
	              }
	             
	            }

	       		$package['path']=$path.$dirname."/";
	       		$package['name']=$dirname;
	       		$package['title']=ucwords(str_replace('-',' ', $dirname));
	       		$package['uri']=trailingslashit(plugin_dir_url($package['path']).$dirname);
	       		$packages[$dirname]=$package;
		    }
		  }
	return $packages;
}

?>