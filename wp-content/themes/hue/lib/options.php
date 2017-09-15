<?php
defined('ABSPATH') or die();
if(!defined('DETHEME_INSTALLED')) define("DETHEME_INSTALLED",true);

if ( !class_exists( 'DethemeReduxFramework' ) && file_exists( get_template_directory(). '/redux-framework/ReduxCore/framework.php' ) ) {

	require_once(get_template_directory().'/redux-framework/ReduxCore/framework.php');

}
if( !isset($DethemeReduxFramework) && file_exists( get_template_directory() . '/redux-framework/option/config.php' )){
	require_once(get_template_directory().'/redux-framework/option/config.php');
}

?>