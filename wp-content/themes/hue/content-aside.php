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

					<?php get_template_part('pagetemplates/postinfo'); ?>

<?php if (is_single()) : ?>
					<div class="postcontent">
						<h2 class="blog-post-title"><?php the_title();?></h2>

						<?php get_template_part('pagetemplates/postinfotag'); ?>

						<?php the_content();

							wp_link_pages( detheme_get_link_pages_args() );
						?>

						<?php get_template_part('pagetemplates/postmetabottom_detail'); ?>
					</div>

					<?php get_template_part('pagetemplates/postaboutcomment'); ?>

<?php else : //if (is_single()) ?>
					<div class="postcontent">
						<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>

						<?php 

							//$content = get_the_content(' ');
							$content = apply_filters('the_content', get_the_content(' '));
							$content = hue_remove_shortcode_from_content($content);
							$content = str_replace( ']]>', ']]&gt;', $content );

							if (has_excerpt()) {
								$excerpt = apply_filters('the_excerpt', get_the_excerpt());
								print $excerpt . '<a class="more-link"></a>';	
							} else {
								print $content;
							}

						?>
					</div>

					<?php get_template_part('pagetemplates/postmetabottom'); ?>
<?php endif; ?>
				</div> 
			</article>
		</div><!--div class="row"-->
