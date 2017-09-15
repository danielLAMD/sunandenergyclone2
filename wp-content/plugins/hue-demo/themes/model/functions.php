<?php
defined('ABSPATH') or die();

function hue_option_import($allowed){

	return array_merge($allowed, array('dt_post_settings','dt_report_post_settings','essential_grid_settings','wpb_js_content_types','wpb_js_templates',
		'wooscarcity_setting','loop_cross_sells_columns','loop_cross_sells_total','loop_per_page','loop_related_columns','loop_related_per_page','loop_shop_columns'
		));
}

add_filter('import_option_accepted','hue_option_import');
?>