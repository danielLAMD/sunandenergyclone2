<?php
defined('ABSPATH') or die();

/**
 * The default template for displaying content quote
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
?>

<?php 
	$bgstyle = 'bg_'.$post->ID;
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full',false); 
	if (isset($featured_image[0])) {
		$detheme_Style = '#bg_'.$post->ID.' { background: url(\''.esc_url($featured_image[0]).'\') no-repeat; background-size: cover; }';
		detheme_set_global_style($detheme_Style);
	} 
?>		

		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="col-xs-12">
					<div class="postcontent postcontent-quote primary_color_bg" id="<?php echo esc_attr($bgstyle); ?>">
						<h2 class="hide"><?php echo wp_kses_data(get_the_title()); ?></h2>
						<?php the_content(); ?>
					</div>

					<div class="postmetabottom">
						<div class="row">
							<div class="col-xs-12 text-right blog_info_share">
								<?php get_template_part('pagetemplates/social','share'); ?>
							</div>
						</div>

						<div class="postborder"></div>
					</div>

				</div>
			</article>
		</div><!--div class="row"-->