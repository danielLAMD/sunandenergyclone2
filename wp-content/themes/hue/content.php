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

<?php if (is_single()) : ?>

				<div class="row">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="col-xs-12">

<?php	if ($imageurl!="") { ?>											
							<div class="postimagecontent nolink">
								<img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>">
							</div>
<?php
			$nohead = '';
			$sharepos = '';
		} 
?>											

							<?php get_template_part('pagetemplates/postinfo'); ?>

							<div class="postcontent">
								<h2 class="blog-post-title"><?php the_title();?></h2>

								<?php get_template_part('pagetemplates/postinfotag'); ?>

		                		<?php
									the_content();

							        wp_link_pages( detheme_get_link_pages_args() );
								?>

								<?php get_template_part('pagetemplates/postmetabottom_detail'); ?>
							</div>

							<?php get_template_part('pagetemplates/postaboutcomment'); ?>
						</div>

					</article>
				</div><!--div class="row"-->

<?php else : //if (is_single()) :?>

		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if ($imageurl!="") {
?>											
				<div class="col-xs-12">
					<div class="postimagecontent">
						<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php print esc_attr(get_the_title());?>"><img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>"></a>
					</div>
				</div>
<?php
	} 
?>											

				<div class="col-xs-12<?php print ($imageurl!='')?' col-md-push-0 margin_top_40_max_sm':'';?>">
					<div class="postcontent">

						<?php get_template_part('pagetemplates/postinfo'); ?>

						<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>
						
						<?php get_template_part('pagetemplates/postinfotag'); ?>

						<?php 
							$content = apply_filters('the_content', get_the_content(' '));

							if (has_excerpt()) {
								$excerpt = apply_filters('the_excerpt', get_the_excerpt());
								print $excerpt . '<a class="more-link"></a>';	
							} else {
								print $content;
							}
						?>
					</div>

					<?php get_template_part('pagetemplates/postmetabottom'); ?>

				</div> 
			</article>
		</div>

<?php endif; ?>
