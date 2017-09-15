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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-xs-12">
		<div class="postcontent">
			<?php if(get_detheme_option('dt-show-title-page') && (bool)get_detheme_option('essential_grid-title')):?>
			<div class="col-xs-12">
				<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>
			</div>
    		<?php endif;?>
    		<?php
				the_content();
			?>
		</div>
		<?php get_template_part('essential_grid/postaboutcomment'); ?>
	</div>

</article>
