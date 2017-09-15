<?php
defined('ABSPATH') or die();

function hue_add_font_selector($buttons) {    
    
    $buttons[] = 'fontsizeselect';

    return $buttons;
}

add_filter('mce_buttons_2', 'hue_add_font_selector');

function hue_get_font_sizes($in){
    $in['fontsize_formats']=esc_html__("Bigger",'hue')."=1.2em ".esc_html__('Big','hue')."=1.1em ".esc_html__("Small",'hue')."=0.9em ".esc_html__("Smaller",'hue')."=0.8em";
 return $in;
}

add_filter('tiny_mce_before_init', 'hue_get_font_sizes');
?>