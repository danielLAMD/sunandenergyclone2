<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content gallery on masonry layout
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

		$content = get_the_content(' ');
		$pattern = get_shortcode_regex();

		$hasgallery = false;

		$content=preg_replace_callback('/'. $pattern .'/s',
			function($matches){

				global $globalhasgallery;
				static $id = 0;
				$id++;

				if($matches[2]=='gallery') {

					if($id==1){
						$globalhasgallery=$matches[3];
					}

				}
				else{
					return $matches[0];
				}
				return " ";

			}
		,$content,-1,$matches_count);

		$hasgallery = detheme_get_global_var('globalhasgallery');

		$content = apply_filters( 'the_content', hue_remove_shortcode_from_content($content));
		$content = str_replace( ']]>', ']]&gt;', $content );
?>

		<div class="container-fluid">
			<div class="row">

<?php
	if ($hasgallery) { 
?>
					<div class="postimage">
						<?php 						
							$gallery_shortcode_attr = shortcode_parse_atts($hasgallery);
							$attachment_image_ids = explode(',',$gallery_shortcode_attr['ids']);
?>

						<div id="gallery-carousel-<?php echo get_the_ID(); ?>" class="carousel slide post-gallery-carousel" data-ride="carousel" data-interval="3000">

					        <div class="carousel-inner">
<?php
							$i = 0;
							foreach ($attachment_image_ids as $attachment_id) {
    							$attached_img = wp_get_attachment_image_src($attachment_id,'large');
    							$alt_image = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
?>
								<div class="item <?php echo($i==0) ? 'active' : ''; ?>"><img src="<?php echo esc_url($attached_img[0]); ?>" alt="<?php echo esc_attr($alt_image); ?>" /></div>
<?php
								$i++;
							}
?>
					        </div>

							<div class="post-gallery-carousel-nav">
								<div class="post-gallery-carousel-buttons">
							        <a href="#gallery-carousel-<?php echo get_the_ID(); ?>" data-slide="prev" class="icon-left-open-big">
							        </a>
							        <a href="#gallery-carousel-<?php echo get_the_ID(); ?>" data-slide="next" class="icon-right-open-big">
							        </a>
						    	</div>
					    	</div>
					    </div>			
					</div>
<?php	} //if ($hasgallery)?> 
				<div class="col-xs-12">
					<?php get_template_part('pagetemplates/ms_categories'); ?>
				</div>

				<div class="col-xs-12">
					<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>
				</div>

				<div class="col-xs-12 blog_info_author">
					<?php printf(esc_html__('By %s', 'hue'),get_the_author_link());?>/ <?php print get_the_date();?>
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
