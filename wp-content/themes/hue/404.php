<?php
defined('ABSPATH') or die();
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage hue
 * @since hue 1.0
 */
get_header();
?>
<div clss='content'>
<div class="nosidebar">
	<!-- <div class="container"> -->
		<?php if (get_detheme_option('dt-404-page') && $post = get_post(get_detheme_option('dt-404-page'))) :
		if(get_detheme_option('dt-show-title-page')):?>
		<h1 class="page-title"><?php print get_detheme_option('page-title','');?></h1>
		<?php endif;?>
		<div class="row">
			<div class="col-xs-12">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<div class="postcontent">
<?php
	print do_shortcode($post->post_content);
?>
							</div>
						</div>
					</div>
					</article>
		</div>
		<?php else:?>
<div class="container">
	<div class="page-404-wrap">
		<h2>404</h2>
	   <div class="page-404-subheading"><?php esc_html_e('Sorry, this page isn\'t available','hue');?></div>
	    <p><?php esc_html_e('The link you followed is probably broken, or the page has been removed','hue');?></p>
	    <div class="page-404-button"><a href="<?php print esc_url(home_url('/'));?>" class="btn btn-ghost skin-dark"><?php esc_html_e('BACK TO HOMEPAGE','hue');?></a></div>
	</div>
</div>

		<?php endif;?>

	</div><!-- .container -->
<!-- </div> -->
</div><!-- .page -->
</div>

<?php wp_footer(); ?>
</body>
</html>
