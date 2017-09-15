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

$stretched_menu_class = get_detheme_option("dt-is-stretched-menu") ? "stretched_menu":"";
$menu_type_class = get_detheme_option("dt-header-type","");
?>

<div id="head-page" class="head-page<?php  print is_admin_bar_showing()?" adminbar-is-here":" adminbar-not-here";?> notopbar <?php print sanitize_html_class($stretched_menu_class); ?>  <?php print sanitize_html_class($menu_type_class); ?> menu_background_color">
<?php

    $logo_img=get_detheme_option('dt-logo-image');
    $logo = isset($logo_img['url']) ? detheme_remove_http($logo_img['url']) : "";
    $alt_image = isset($logo_img['id']) ? get_post_meta($logo_img['id'], '_wp_attachment_image_alt', true) : "";

    $logo_sticky_img=get_detheme_option('dt-logo-image-transparent');
    $logo_sticky = isset($logo_sticky_img['url']) ?  detheme_remove_http($logo_sticky_img['url']) : "";
    $logo_sticky_alt = isset($logo_sticky_img['id']) ? get_post_meta($logo_sticky_img['id'], '_wp_attachment_image_alt', true) : "";

    $logo_home_img=get_detheme_option('homepage-dt-logo-image');
    $logo_home = isset($logo_home_img['url']) ? detheme_remove_http($logo_home_img['url']) : "";
    $logo_home_alt = isset($logo_home_img['id']) ? get_post_meta($logo_home_img['id'], '_wp_attachment_image_alt', true) : "";

    $logo_home_sticky_img=get_detheme_option('homepage-dt-logo-image-transparent');
    $logo_home_sticky = isset($logo_home_sticky_img['url']) ? detheme_remove_http($logo_home_sticky_img['url']) : "";
    $logo_home_sticky_alt = isset($logo_home_sticky_img['id']) ? get_post_meta($logo_home_sticky_img['id'], '_wp_attachment_image_alt', true) : "";

    if (get_detheme_option('dt-header-type')) {
      switch (get_detheme_option('dt-header-type')) {
        case "sidemenuoverlay":
        case "pushmenuoverlay":
        case "stackmenuoverlay":
        case "centermenuoverlay":
          if (detheme_plugin_is_active('dt_menu/dt_menu.php')) {

                $logo_overlay_img=get_detheme_option('overlay-dt-logo-image');
                $logo_overlay = isset($logo_overlay_img['url']) ? detheme_remove_http($logo_overlay_img['url']) : "";
                $alt_image_overlay = isset($logo_overlay_img['id']) ? get_post_meta($logo_overlay_img['id'], '_wp_attachment_image_alt', true) : "";

            $menuAttributes = array(
                'logo_url' => $logo,
                'logo_alt' => $alt_image,
                'logo_sticky_url' => $logo_sticky,
                'logo_sticky_alt' => $logo_sticky_alt,
                'logo_overlay_url' => $logo_overlay,
                'logo_overlay_alt' => $alt_image_overlay,

                'logo_width' => get_detheme_option('logo-width',''),
                'logo_top_margin' => get_detheme_option('logo-top',''),
                'logo_left_margin' => get_detheme_option('logo-left',''),
                'logo_top_margin_sticky' => '',
                //'home_url' => home_url('/'),
                'nav_bar_height' => '',
                'nav_background_color' => '',
                'nav_font_color' => '',
                'nav_background_color_sticky' => '',
                'nav_font_color_sticky' => '',

                'home_logo_url' => $logo_home,
                'home_logo_alt' => $logo_home_alt,
                'home_logo_sticky_url' => $logo_home_sticky,
                'home_logo_sticky_alt' => $logo_home_sticky_alt,
                'home_nav_background_color' => '',
                'home_nav_font_color' => '',
                'home_nav_background_color_sticky' => '',
                'home_nav_font_color_sticky' => '',
                'social_menu' => get_detheme_option('socialmenu',''),
                'is_sticky' => get_detheme_option('dt-sticky-menu'),
                'show_searchmenu' => get_detheme_option('show-header-searchmenu'),
                'show_shoppingcart' => get_detheme_option('show-header-shoppingcart')
            );

            dt_menu::get_menu(get_detheme_option('dt-header-type','left'),$menuAttributes);
          }
          break;
        default:
            get_template_part('pagetemplates/mainmenu');
          break;
      }  
    }
?>
</div>