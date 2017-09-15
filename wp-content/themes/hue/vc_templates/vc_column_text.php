<?php
defined('ABSPATH') or die();
$output = $el_class = $css_animation = '';

extract(shortcode_atts(array(
    'el_class' => '',
    'css_animation' => '',
    'css' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'wpb_text_column wpb_content_element '.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);
$css_class .= $this->getCSSAnimation($css_animation);
echo "\n\t".'<div class="'.detheme_sanitize_html_class($css_class).'">';
echo "\n\t\t".'<div class="wpb_wrapper">';
echo "\n\t\t\t".wpb_js_remove_wpautop($content, true);
echo "\n\t\t".'</div> ';
echo "\n\t".'</div> ';

if(!empty($css)){
	detheme_set_global_style($css);
	//$detheme_Style[]=$css;
}