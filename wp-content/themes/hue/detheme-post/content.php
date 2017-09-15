<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
?>

<div class="row">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="col-xs-12">
			<div class="postcontent">
				<?php if((get_detheme_option('service-title')!==null) && get_detheme_option('service-title')):?>
				<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>
        		<?php endif;?>
        		<?php

					the_content();
				?>
			</div>
			<?php get_template_part('detheme-post/postaboutcomment'); ?>
		</div>

	</article>
</div>
