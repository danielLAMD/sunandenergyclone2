<?php
defined('ABSPATH') or die();

function hue_custom_tinymce_plugin_translation() {
    $strings = array(
        'insert_dt_shortcode' => esc_html__('Insert Hue Shortcode', 'hue'),
        'dt_shortcode' => esc_html__('Hue Shortcode', 'hue'),
        'icon_title' => esc_html__('Icon', 'hue'),
        'button_title'=>esc_html__('Buttons','hue'),
        'counto_title'=>esc_html__('Count To','hue'),
    );
    $locale = _WP_Editors::$mce_locale;

    $translated = 'tinyMCE.addI18n("' . $locale . '.dtshortcode", ' . json_encode( $strings ) . ");\n";

     return $translated;
}
$strings = hue_custom_tinymce_plugin_translation();
?>