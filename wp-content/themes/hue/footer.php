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
 * @version 1.0
 */

do_action('hue_before_footer_section');
//showfooterarea

if(get_detheme_option('showfooterarea')){
	get_footer('footerarea');
}

do_action('hue_after_footer_section');
?>
<?php

	/*** Boxed layout ***/
	$is_vertical_menu = false;
	$is_boxed = false;
	if(get_detheme_option('boxed_layout_activate')){
		$is_boxed = true;
		$is_boxed_stretched = get_detheme_option('boxed_layout_stretched');

		if (get_detheme_option('dt-header-type')=='leftbar') {
			$is_vertical_menu = true;
			echo wp_kses_data('</div></div>');
		} else {
			if ($is_boxed_stretched) {
				echo wp_kses_data('</div><!-- .dt-boxed-stretched-container --></div><!-- .paspartu_inner --></div><!-- .paspartu_outer -->');
			} else if($is_boxed) {
				echo wp_kses_data('</div>');
			}
		}

	}
?>
<?php wp_footer(); ?>
</body>
</html>