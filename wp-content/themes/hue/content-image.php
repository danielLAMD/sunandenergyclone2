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
	$thumb_id = get_post_thumbnail_id($post->ID);

	$featured_image = wp_get_attachment_image_src($thumb_id,'full',false); 
	if (isset($featured_image[0])) {
		$imageurl = $featured_image[0];
	} else {
		$imageurl = detheme_get_first_image_url_from_content();
	}

	$alt_image = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
	
	/* Get Image from content image */
	$pattern = get_shortcode_regex();
	preg_match_all( '/'. $pattern .'/s', get_the_content(), $matches );
	/* find first caption shortcode */


	$i = 0;
	$hascaption = false;
	foreach ($matches[2] as $shortcodetype) {
		if ($shortcodetype=='caption') {
			$hascaption = true;
			break;
		}
	    $i++;
	}

	if ($hascaption and empty($imageurl)) {
		preg_match('/^<a.*?href=(["\'])(.*?)\1.*$/', $matches[5][$i], $m);
		$imageurl = $m[2];
	}
?>

		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php	if ($imageurl!="") { ?>											
				<div class="col-xs-12">
					<div class="postimagecontent">
<?php if (is_single()) : ?>
						<img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>">
<?php else : //if (is_single()) ?>
						<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr(get_the_title());?>"><img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>"></a>
<?php endif; //if (is_single()) ?>
					</div>
				</div>
<?php
		} //if ($imageurl!="")
?>

				<div class="col-xs-12<?php echo ($imageurl!="")?' col-md-push-0 margin_top_40_max_sm':'';?>">
<?php if (is_single()) : ?>
					<div class="postcontent">

						<?php get_template_part('pagetemplates/postinfo'); ?>

						<h2 class="blog-post-title"><?php the_title();?></h2>

						<?php get_template_part('pagetemplates/postinfotag'); ?>
						
						<?php the_content(); 

					        wp_link_pages( detheme_get_link_pages_args() );
						?>
					</div>

					<?php get_template_part('pagetemplates/postmetabottom_detail'); ?>

					<?php get_template_part('pagetemplates/postaboutcomment'); ?>
<?php else : //if (is_single()) ?>
					<div class="postcontent">

						<?php get_template_part('pagetemplates/postinfo'); ?>

						<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>

						<?php get_template_part('pagetemplates/postinfotag'); ?>
						
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
<?php endif; //if (is_single()) ?>
				</div>
			</article>
		</div><!--div class="row"-->
