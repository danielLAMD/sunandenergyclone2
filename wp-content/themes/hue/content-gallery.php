<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content post gallery
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
?>

<?php 

	$sharepos = 'sharepos';
?>

<?php if (is_single()) :
	$content=get_the_content();
	//Find video shotcode in content
	$pattern = get_shortcode_regex();

	$hasgallery = false;

	$content_replaced=preg_replace_callback('/'. $pattern .'/s',
		function($matches){

			global $detheme_globalgallery;
			static $id = 0;
			$id++;

			if($matches[2]=='gallery') {

				if($id==1){
					$detheme_globalgallery=$matches[3];
				}

			}
			else{
				return $matches[0];
			}
			return " ";

		}
	,$content,-1,$matches_count);


	$content = apply_filters( 'the_content', do_shortcode($content));
	$content = str_replace( ']]>', ']]&gt;', $content );

	$hasgallery = detheme_get_global_var('detheme_globalgallery');
 ?>

				<div class="row">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="col-xs-12">

						<?php	if ( $hasgallery) { ?>
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
								<div class="item <?php echo ($i==0) ? 'active' : ''; ?>"><img src="<?php echo !empty($attached_img[0]) ? esc_url($attached_img[0]) : "#"; ?>" alt="<?php echo esc_attr($alt_image); ?>" /></div>
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
						<?php		$sharepos = '';
								} ?> 

							<?php get_template_part('pagetemplates/postinfo'); ?>

							<div class="postcontent">
								<h2 class="blog-post-title"><?php the_title();?></h2>

								<?php get_template_part('pagetemplates/postinfotag'); ?>

		                		<?php  print $content;

		                			wp_link_pages( detheme_get_link_pages_args() );
		                		?>

								<?php get_template_part('pagetemplates/postmetabottom_detail'); ?>
							</div>

							<?php get_template_part('pagetemplates/postaboutcomment'); ?>

						</div>

					</article>
				</div><!--div class="row"-->


<?php else :  //if (is_single())

	$content = get_the_content(' ');
	$pattern = get_shortcode_regex();

	$hasgallery = false;

	$content_replaced=preg_replace_callback('/'. $pattern .'/s',
		function($matches){

			global $detheme_globalgallery;
			static $id = 0;
			$id++;

			if($matches[2]=='gallery') {

				if($id==1){
					$detheme_globalgallery=$matches[3];
				}

			}
			else{
				return $matches[0];
			}
			return " ";

		}
	,$content,-1,$matches_count);

	if ( $hasgallery  ) {
		$content = apply_filters( 'the_content', hue_remove_shortcode_from_content($content));
	} else {
		$content = apply_filters( 'the_content', do_shortcode($content));
	}
	$content = str_replace( ']]>', ']]&gt;', $content );

	$hasgallery = detheme_get_global_var('detheme_globalgallery');

	?>

		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if ( $hasgallery  ) { 
?>
				<div class="col-xs-12">
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
								<div class="item <?php echo($i==0) ? 'active' : ''; ?>"><img src="<?php echo !empty($attached_img[0]) ? esc_url($attached_img[0]) : "#"; ?>" alt="<?php echo esc_attr($alt_image); ?>" /></div>
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
				</div>
<?php
	} 
?> 
				<div class="col-xs-12<?php echo ($hasgallery)?' col-md-push-0 margin_top_40_max_sm':'';?>">
					<div class="postcontent">

						<?php get_template_part('pagetemplates/postinfo'); ?>

						<h2 class="blog-post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?></a></h2>

						<?php get_template_part('pagetemplates/postinfotag'); ?>

						<?php 
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
		</div><!--div class="row"-->

<?php endif; //if (is_single()) :?>