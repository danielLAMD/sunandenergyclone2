<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content video post format
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
?>
<?php 
	$nohead = '';

	$imageurl = "";
	$sharepos = 'sharepos';

	$thumb_id = get_post_thumbnail_id($post->ID);
	if (isset($post->ID)) {
		$featured_image = wp_get_attachment_image_src($thumb_id,'full',false); 
		if (isset($featured_image[0])) {
			$imageurl = $featured_image[0];
		}
	}

	$alt_image = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
?>

<?php if (is_single()) : ?>

				<div class="row">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="col-xs-12">

<?php	if ($imageurl!="") { ?>											
							<div class="postimagecontent">
								<img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>">
							</div>
<?php
			$nohead = '';
			$sharepos = '';
		} 
?>						
							<div class="postcontent">

								<?php get_template_part('pagetemplates/postinfo'); ?>

								<h2 class="blog-post-title"><?php the_title();?></h2>

								<?php get_template_part('pagetemplates/postinfotag'); ?>

								<?php the_content(); 

							        wp_link_pages( detheme_get_link_pages_args() );

								?>

								<?php get_template_part('pagetemplates/postmetabottom_detail'); ?>
							</div>

							<?php get_template_part('pagetemplates/postaboutcomment'); ?>
						</div>

					</article>
				</div>


<?php else : 


	$hasvideoshortcode = false;

	$content=$originalcontent=get_the_content(' ');
	$pattern = get_shortcode_regex();

	$shortcodepos = -1;
	$content=preg_replace_callback('/'. $pattern .'/s',
		function($matches){

			global $detheme_videoshortcode;
			static $id = 0;
			$id++;

			if(($matches[2]=='video')||($matches[2]=='wpvideo')) {

				if($id==1){
					$detheme_videoshortcode=$matches[0];
				}

			}
			else{
				return $matches[0];
			}
			return " ";

		}
	,$content,-1,$matches_count);

	$hasvideoshortcode = detheme_get_global_var('detheme_videoshortcode');

	if($hasvideoshortcode){
		$shortcodepos = strpos($originalcontent,$hasvideoshortcode);
	}

	$hasyoutubelink = false;
	$youtubepos = -1;

	$content=preg_replace_callback('@https?://(www.)?(youtube|vimeo)\.com/(watch\?v=)?([a-zA-Z0-9_-]+)@im',
		function($matches){

			global $globalyoutubelink;

			static $id = 0;
	        $id++;
			if($id==1){
				$globalyoutubelink=$matches[0];
			}
			return " ";

		}
	,$content,-1,$matches_count);

	$hasyoutubelink = detheme_get_global_var('globalyoutubelink');

	if($hasyoutubelink){
		$youtubepos = strpos($originalcontent,$hasyoutubelink);
	}

	$content = apply_filters( 'the_content', hue_remove_shortcode_from_content($content));
	$content = str_replace( ']]>', ']]&gt;', $content );

	?>

		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php  if ($hasvideoshortcode or $hasyoutubelink) { ?>											
				<div class="col-xs-12">
					<div class="postimage">
<?php
                			if ($hasvideoshortcode and $hasyoutubelink) {
                				if ($shortcodepos<$youtubepos) {
                					echo do_shortcode($hasvideoshortcode);
                				} else {
	                				echo wp_kses_data('<div class="flex-video">');
	                				echo wp_kses_data(wp_oembed_get($hasyoutubelink));
	                				echo wp_kses_data('</div>');
                				}
                			} elseif ($hasyoutubelink) {
                				echo wp_kses_data('<div class="flex-video">');
                				echo wp_kses_data(wp_oembed_get($hasyoutubelink));
                				echo wp_kses_data('</div>');
                			} else {
                				echo do_shortcode($hasvideoshortcode);
                			} 
                		?>					
                	</div>
				</div>
			<?php
					} elseif ($imageurl!="") { 
?>
				<div class="col-xs-12">
					<div class="postimagecontent">
						<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php echo esc_attr(get_the_title());?>"><img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>"></a>

					</div>
				</div>
<?php
					}  ?>						

				<div class="col-xs-12<?php
				if ($hasvideoshortcode or $hasyoutubelink) { 
					print " col-md-push-0 margin_top_40_max_sm";
				} elseif ($imageurl!="") { 
					//print " col-sm-10 col-md-5 col-md-push-0 col-lg-6 margin_top_40_max_sm";
				}
				else{
					//print " col-sm-11";
				}
				 ?>">
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
		</div>

<?php endif; ?>