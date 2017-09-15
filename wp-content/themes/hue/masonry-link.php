<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content link on masonry layout
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
?>

<?php 

	//$bgstyle = '';
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full',false); 
	$bg_url = '';
	if (isset($featured_image[0])) {
		//$bgstyle = ' style="background: url(\''.esc_url($featured_image[0]).'\') no-repeat; background-size: cover;"';
		$bg_url = $featured_image[0];
	} 
?>		

		<div class="container-fluid">
			<div class="row">
					<div class="postcontent postcontent-link primary_color_bg" style="background-image: url('<?php echo esc_url($bg_url)?>');">
						<h2 class="blog-post-title"><a href="<?php echo esc_url(get_the_content()); ?>" target="_blank"><?php the_title();?></a></h2>
						<?php the_content(); ?>
					</div>
			</div>
			<div class="row">
				<?php if(is_rtl()):?>
					<div class="col-xs-12 text-left blog_info_share">
						<?php get_template_part('pagetemplates/ms_social_share'); ?>
					</div>
				<?php else:?>
					<div class="col-xs-12 text-right blog_info_share">
						<?php get_template_part('pagetemplates/ms_social_share'); ?>
					</div>
				<?php endif;?>

			</div>
		</div>