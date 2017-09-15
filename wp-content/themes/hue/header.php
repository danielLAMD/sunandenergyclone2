<?php
/**
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
*/
defined('ABSPATH') or die();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('lib/page','options'); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url(bloginfo( 'pingback_url' )); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); print get_detheme_option('body_tag','');?>>
<?php get_template_part('pagetemplates/preloader'); ?>
<?php 
if(!is_404()): 
	/*** Boxed layout ***/

	if(get_detheme_option('boxed_layout_activate')){

		if (get_detheme_option('dt-header-type')!='leftbar') {

			if (get_detheme_option('boxed_layout_stretched')) {
				echo wp_kses_data('<div class="paspartu_outer paspartu_on_bottom_fixed body_background_color">
					    <div class="paspartu_top body_background_color"></div>
					    <div class="paspartu_left body_background_color"></div>
					    <div class="paspartu_right body_background_color"></div>
					    <div class="paspartu_bottom body_background_color"></div>
					    <div class="paspartu_inner body_background_color">'.
				'<div class="container dt-boxed-stretched-container body_background_color">');

			} else {
				echo wp_kses_data('<div class="container dt-boxed-container">');
			}

		} 

	}

	?>	
<input type="checkbox" name="nav" id="main-nav-check">
<div class="top-head<?php  print is_admin_bar_showing()?" adminbar-is-here":"";?><?php print get_detheme_option('dt-sticky-menu') ?" is-sticky-menu":" no-sticky-menu";?> <?php print get_detheme_option('dt-header-type')=='leftbar'?" vertical_menu":"";?>">

<?php 
	if(get_detheme_option('dt-show-header',true)): 
		get_template_part('pagetemplates/heading');
	endif;
?>

</div>

<?php
	if(get_detheme_option('show-banner-area') and !is_404()){
		get_template_part('pagetemplates/banner');
	}
?>

<?php do_action('after_menu_section'); ?>

<?php endif; //if(!is_404())?>
