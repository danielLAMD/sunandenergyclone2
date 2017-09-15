<?php
defined('ABSPATH') or die();
$output = $title = $link = $size = $el_class = '';
extract(shortcode_atts(array(
	'title' => '',
	'link' => 'http://vimeo.com/23237102',
	'size' => ( isset($content_width) ) ? $content_width : 500,
	'el_class' => '',
  'css' => ''

), $atts));

if ( $link == '' ) { return null; }
$el_class = $this->getExtraClass($el_class);

$video_w = ( isset($content_width) ) ? $content_width : 500;
$video_h = $video_w/1.61; //1.61 golden ratio

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_video_widget wpb_content_element'.$el_class.$el_class.vc_shortcode_custom_css_class($css, ' '), $this->settings['base']);

echo "\n\t".'<div class="'.detheme_sanitize_html_class($css_class).'">';
echo "\n\t\t".'<div class="wpb_wrapper">';
echo wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_video_heading'));
$wp_embed = detheme_get_global_var('wp_embed');
echo wp_kses_data($wp_embed->run_shortcode('[embed width="'.$video_w.'"'.$video_h.']'.$link.'[/embed]'));
echo "\n\t\t".'</div> ';$this->endBlockComment('.wpb_wrapper');
echo "\n\t".'</div> ';$this->endBlockComment('.wpb_video_widget');
