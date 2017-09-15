<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying blog
 *
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 * @version 1.0
 */

	if ( have_posts() ) :
?>
		<div class="blank-reveal-area"></div>
		<ul class="blog-masonry grid effect-1" id="grid">
<?php
		while ( have_posts() ) : the_post();
?>
			<li><div class="single-masonry"><?php get_template_part( 'masonry', get_post_format() ); ?></div></li>
<?php 
		endwhile;
?>
		</ul>
<?php
	else :
		get_template_part( 'content', 'none' );
	endif;
?>
