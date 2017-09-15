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
	$imageurl = "";
	$sharepos = 'sharepos';

	/* Get Image from featured image */
	$thumb_id = get_post_thumbnail_id($post->ID);
	$featured_image = wp_get_attachment_image_src($thumb_id,'full',false); 
	if (isset($featured_image[0])) {
		$imageurl = $featured_image[0];
	}

	$alt_image = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);

?>

<?php if (is_single()) : 


	$content=get_the_content(' ');
	//Find video shotcode in content
	$pattern = get_shortcode_regex();

	$hasaudioshortcode = false;

	$content=preg_replace_callback('/'. $pattern .'/s',
		function($matches){

			global $detheme_audioshortcode;
			static $id = 0;
			$id++;

			if($matches[2]=='audio') {

				if($id==1){
					$detheme_audioshortcode=$matches[0];
				}

			}
			//else{
				return $matches[0];
			//}
			//return " ";

		}
	,$content,-1,$matches_count);

	$content = apply_filters( 'the_content', do_shortcode($content));
	$content = str_replace( ']]>', ']]&gt;', $content );

	$hasaudioshortcode = detheme_get_global_var('detheme_audioshortcode');
?>

				<div class="row">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="col-xs-12">

						<?php   if ($hasaudioshortcode) { ?>											
							<div class="postimage">
							<?php if ($imageurl!="") { ?>
								<img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>">
							<?php } else { ?>
								<div class="postaudio tertier_color_bg">
									<i class="icon-note-beamed"></i>
								</div>
							<?php } ?>
		                		<?php
		                			//Display video 
		               				echo do_shortcode($hasaudioshortcode);
		                		?>
							</div>
						<?php		$sharepos = '';
								} //if ($hasvideoshortcode or $hasyoutubelink) ?>							

							<div class="postcontent">
								<?php get_template_part('pagetemplates/postinfo'); ?>
						
								<h2 class="blog-post-title"><?php the_title();?></h2>

								<?php get_template_part('pagetemplates/postinfotag'); ?>

		                		<?php print $content;

									wp_link_pages( detheme_get_link_pages_args() );
		                		?>

								<?php get_template_part('pagetemplates/postmetabottom_detail'); ?>
							</div>

							<?php get_template_part('pagetemplates/postaboutcomment'); ?>
						</div>

					</article>
				</div><!--div class="row"-->


<?php else : //if (is_single())
	$content=get_the_content(' ');
	//Find video shotcode in content
	$pattern = get_shortcode_regex();

	$hasaudioshortcode = false;

	$content=preg_replace_callback('/'. $pattern .'/s',
		function($matches){

			global $detheme_audioshortcode;
			static $id = 0;
			$id++;

			if($matches[2]=='audio') {

				if($id==1){
					$detheme_audioshortcode=$matches[0];
				}

			}
			else{
				return $matches[0];
			}
			return " ";

		}
	,$content,-1,$matches_count);

	$content = apply_filters( 'the_content', hue_remove_shortcode_from_content($content));
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	$hasaudioshortcode = detheme_get_global_var('detheme_audioshortcode');

	?>

		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php    if ($hasaudioshortcode) { ?>											
				<div class="col-xs-12">
					<div class="postimage">
					<?php if ($imageurl!="") { ?>
						<img class="img-responsive" alt="<?php echo esc_attr($alt_image); ?>" src="<?php echo esc_url($imageurl); ?>">
					<?php } else { ?>
						<div class="postaudio tertier_color_bg">
							<i class="icon-note-beamed"></i>
						</div>
					<?php } ?>
                		<?php
                			//Display audio 
               				echo do_shortcode($hasaudioshortcode);
                		?>
					</div>
				</div>
<?php
		} 
?>											

				<div class="col-xs-12<?php print ($hasaudioshortcode!='')?' col-md-push-0 margin_top_40_max_sm':'';?>">
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