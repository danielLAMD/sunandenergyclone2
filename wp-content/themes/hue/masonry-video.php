<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content video on masonry layout
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

		$hasvideoshortcode = false;

		$content=$originalcontent=get_the_content(' ');
		$pattern = get_shortcode_regex();

		$shortcodepos = -1;
		$content=preg_replace_callback('/'. $pattern .'/s',
			function($matches){

				global $globalvideoshortcode;
				static $id = 0;
				$id++;

				if($matches[2]=='video') {

					if($id==1){
						$globalvideoshortcode=$matches[0];
					}

				}
				else{
					return $matches[0];
				}
				return " ";

			}
		,$content,-1,$matches_count);

		$hasvideoshortcode = detheme_get_global_var('globalvideoshortcode');

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

		<div class="container-fluid">
			<div class="row">
			
<?php  			if ($hasvideoshortcode or $hasyoutubelink) { ?>											
				<div class="postimage">
<?php
            			if ($hasvideoshortcode and $hasyoutubelink) {
            				if ($shortcodepos<$youtubepos) {
            					echo do_shortcode($hasvideoshortcode);
            				} else {
                				echo '<div class="flex-video">';
                				echo wp_oembed_get($hasyoutubelink);
                				echo '</div>';
            				}
            			} elseif ($hasyoutubelink) {
            				echo '<div class="flex-video">';
            				echo wp_oembed_get($hasyoutubelink);
            				echo '</div>';
            			} else {
            				echo do_shortcode($hasvideoshortcode);
            			} 
            		?>					
            	</div>
<?php
					}  ?>

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
