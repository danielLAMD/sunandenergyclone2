<?php
defined('ABSPATH') or die();
/**
 * Template Name: Blank Page
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */

set_query_var('sidebar','nosidebar');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part('lib/page','options'); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url(bloginfo( 'pingback_url' )); ?>">
<?php wp_head();?>
</head>
<body <?php body_class(); print get_detheme_option('body_tag');?>>

<?php get_template_part('pagetemplates/preloader'); ?>

<!-- start content -->
<div class="content">
<div class="nosidebar">
<?php 
while ( have_posts() ) : 
the_post();
?>
	<div class="post-article">
	<?php 
		the_content();
		wp_link_pages( detheme_get_link_pages_args() );
	 ?>
	</div>

<?php
	if(comments_open()):?>
						<div class="container">
							<div class="comment-count">
								<h3><?php comments_number(esc_html__('No Comments','hue'),esc_html__('1 Comment','hue'),esc_html__('% Comments','hue')); ?></h3>
							</div>

							<div class="section-comment">
								<?php comments_template('/comments.php', true); ?>
							</div><!-- Section Comment -->
						</div>
<?php endif;?>

<?php endwhile; ?>
			</div>
	</div>
<!-- end content -->
<?php wp_footer(); ?>
</body>
</html>