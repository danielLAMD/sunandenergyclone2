<?php
defined('ABSPATH') or die();

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */

if (get_detheme_option('dt_scrollingsidebar_on')) :
	$dt_scrollingsidebar_margin = intval(get_detheme_option('dt_scrollingsidebar_margin',0));
	$dt_scrollingsidebar_top_margin = intval(get_detheme_option('dt_scrollingsidebar_top_margin',200));
	$dt_scrollingsidebar_position = get_detheme_option('dt_scrollingsidebar_position','right');
	$dt_scrollingsidebar_bg_color = get_detheme_option('dt_scrollingsidebar_bg_type') ? get_detheme_option('dt_scrollingsidebar_bg_color','#ecf0f1') : 'transparent';
?>
<div id="floatMenu" data-top-margin="<?php echo esc_attr($dt_scrollingsidebar_top_margin);?>" data-bg-color="<?php echo esc_attr($dt_scrollingsidebar_bg_color);?>" data-position="<?php echo esc_attr($dt_scrollingsidebar_position); ?>" data-margin="<?php echo esc_attr($dt_scrollingsidebar_margin); ?>">
  <?php 
    dynamic_sidebar('detheme-scrolling-sidebar');
    do_action('detheme-scrolling-sidebar');
  ?>
</div>
<?php endif; ?>