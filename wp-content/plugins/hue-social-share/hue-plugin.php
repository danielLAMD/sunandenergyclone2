<?php

/* 
Plugin Name:  Hue Plugin
Plugin URI:   http://detheme.com
Description:  Hue Plugin for Hue Theme.
Version:      1.0
Author:       detheme.com
Author URI:   http://www.detheme.com/
Author Email:
License: 
License URI:
Domain Path: /languages/
Text Domain: hue
*/

defined('ABSPATH') or die();

function social_share_menu_item()
{
  add_submenu_page("options-general.php", "Hue Plugin Social Share", "Hue Plugin Social Share", "manage_options", "hue-social-share", "social_share_page"); 
}

add_action("admin_menu", "social_share_menu_item");

function social_share_style() 
{
    wp_register_style("social-share-style-file", plugin_dir_url(__FILE__) . "style.css");
    wp_enqueue_style("social-share-style-file");
}

add_action("wp_enqueue_scripts", "social_share_style");

function social_share_page()
{
   ?>
      <div class="wrap">
         <h1>Hue Plugin Options</h1>
 
         <form method="post" action="options.php">
            <?php
               settings_fields("social_share_config_section");
 
               do_settings_sections("hue-social-share");
                
               submit_button(); 
            ?>
         </form>
      </div>
   <?php
}

function social_share_settings()
{
    add_settings_section("social_share_config_section", "", null, "hue-social-share");
 
    add_settings_field("social-share-facebook", "Do you want to display Facebook share button?", "social_share_facebook_checkbox", "hue-social-share", "social_share_config_section");
    add_settings_field("social-share-twitter", "Do you want to display Twitter share button?", "social_share_twitter_checkbox", "hue-social-share", "social_share_config_section");
    add_settings_field("social-share-gplus", "Do you want to display Google Plus share button?", "social_share_gplus_checkbox", "hue-social-share", "social_share_config_section");
    
    register_setting("social_share_config_section", "social-share-facebook");
    register_setting("social_share_config_section", "social-share-twitter");
    register_setting("social_share_config_section", "social-share-gplus");
}
 
function social_share_facebook_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-facebook" value="1" <?php checked(1, get_option('social-share-facebook'), true); ?> /> Check for Yes
   <?php
}

function social_share_twitter_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-twitter" value="1" <?php checked(1, get_option('social-share-twitter'), true); ?> /> Check for Yes
   <?php
}

function social_share_gplus_checkbox()
{  
   ?>
        <input type="checkbox" name="social-share-gplus" value="1" <?php checked(1, get_option('social-share-gplus'), true); ?> /> Check for Yes
   <?php
}

 
add_action("admin_init", "social_share_settings");

function add_social_share_icons($content)
{
   	$html = "<div class='social-share-button'><ul class='social-share-button-group'>";

    global $post;

    $url = get_permalink($post->ID);
    $url = esc_url($url);

    if(get_option("social-share-facebook") == 1 || get_option("social-share-twitter") == 1 || get_option("social-share-gplus") == 1){
    	$html .= "<li>SHARE</li>";
    }

    if(get_option("social-share-facebook") == 1)
    {
        $html .= "<li class='facebook-button'><a  target='_blank' href='https://www.facebook.com/sharer/sharer.php' data-url='".esc_url(get_permalink())."'><span><i class='billio-ss-facebook51'></i></span></a></li>";
    }

    if(get_option("social-share-twitter") == 1)
    {
        $html .= "<li class='facebook-button'><a  target='_blank' href='https://twitter.com/intent/tweet' data-url='".esc_url(get_permalink())."'><span><i class='billio-ss-twitter44'></i></span></a></li>";
    }

    if(get_option("social-share-gplus") == 1)
    {
        $html .= '<li class="gplus-button"><a href="https://plus.google.com/share" data-url="'.esc_url(get_permalink()).'"><span class="billio-ss-google115"></span></a></li>';
    }

    $html .= "</ul></div>";
    return $content;
    //return $content = $content . $html;
}

add_filter("the_content", "add_social_share_icons");
?>