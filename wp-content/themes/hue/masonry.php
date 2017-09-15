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

<?php 
	$imageurl = "";

	/* Get Image from featured image */
	if (isset($post->ID)) {
		$thumb_id = get_post_thumbnail_id($post->ID);
		$featured_image = wp_get_attachment_image_src($thumb_id,'full',false); 
		if (isset($featured_image[0])) {
			$imageurl = $featured_image[0];
		}

		$alt_image = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
	}
	

	$nohead = '';
	$sharepos = 'sharepos';
?>

<?php 
	if (!is_single()) : 
		if ($imageurl!="") {
?>
		<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php print esc_attr(get_the_title());?>"><img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>"></a>
<?php 	} //if ($imageurl!="") { ?>											

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<?php get_template_part('pagetemplates/ms_categories'); ?>
				</div>

				<div class="col-xs-12">
					<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>
				</div>

				<div class="col-xs-12 blog_info_author">
					<?php esc_html_e('By ', 'hue'); ?><?php the_author_link(); ?>
					<?php esc_html_e('/ ', 'hue'); ?><?php print get_the_date();?>
				</div>

				<div class="col-xs-12">
					<?php 
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

				<?php if(is_rtl()):?>
					<div class="col-xs-6 text-left blog_info_share">
						<?php get_template_part('pagetemplates/ms_social_share'); ?>
					</div>
					<div class="col-xs-6 masonry_readmore">
						<a target="_self" class="btn-readmore" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More','hue') ?></a>
					</div>
				<?php else:?>
					<div class="col-xs-6 masonry_readmore">
						<a target="_self" class="btn-readmore" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More','hue') ?></a>
					</div>
					<div class="col-xs-6 text-right blog_info_share">
						<?php get_template_part('pagetemplates/ms_social_share'); ?>
					</div>
				<?php endif;?>

			</div>
		</div>
<?php 
	endif; //if (!is_single()) :
?>
