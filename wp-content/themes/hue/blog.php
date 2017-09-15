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
		
		$i = 0;

		while ( have_posts() ) : the_post();
			$i++;

			if ($i==1) :
			?>
			<div class="blank-reveal-area"></div>
			<?php endif;?>
			<?php get_template_part( 'content', get_post_format() ); ?>
			<div class="clearfix">
				<div class="col-xs-12 postseparator"></div>
			</div>
			<?php 
		endwhile;
	else :
		get_template_part( 'content', 'none' );
	endif;
?>
				<!-- Pagination -->
				<div class="row">
					<?php get_template_part('pagetemplates/pagination'); ?>
				</div>
