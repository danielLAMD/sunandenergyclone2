<?php
defined('ABSPATH') or die();
$output = $title = $el_class = $nav_menu = '';
extract( shortcode_atts( array(
	'title' => '',
	'nav_menu' => '',
	'slug'=>'',
	'name'=>'',
	'el_class' => ''
), $atts ) );
$el_class = $this->getExtraClass( $el_class );

if(!is_nav_menu($nav_menu) && (""!=$slug || ""!=$name)){
	if(""!=$slug && $menu_obj = get_term_by( 'slug', $slug, 'nav_menu' ))
	{
		$atts['nav_menu']=$menu_obj->term_id;
	}
	elseif(""!=$name && $menu_obj = get_term_by( 'name', $name, 'nav_menu' )){
		$atts['nav_menu']=$menu_obj->term_id;
	}
}

echo '<div class="vc_wp_custommenu wpb_content_element' . detheme_sanitize_html_class($el_class) . '">';
$type = 'WP_Nav_Menu_Widget';
$args = array();

ob_start();
the_widget( $type, $atts, $args );
echo ob_get_clean();

echo '</div>';