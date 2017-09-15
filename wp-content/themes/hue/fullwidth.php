<?php
defined('ABSPATH') or die();
/**
 * Template Name: Fullwidth
 *
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

get_header();
set_query_var('sidebar','nosidebar');
?>
<div class="content <?php print sanitize_html_class(get_detheme_option('dt-header-type')=='leftbar' ? " vertical_menu_container":"");?>">
<div class="nosidebar">
<?php 
	$i = 0;

	while ( have_posts() ) :
		$i++;
		if ($i==1) :
?>
	<div class="blank-reveal-area"></div>
<?php 	endif; //if ($i==1) 
	the_post();
?>
<?php if(get_detheme_option('dt-show-title-page')):?>
						<h2 class="post-title"><?php the_title();?></h2>
		<?php if($subtitle = get_post_meta( get_the_ID(), '_subtitle', true )):?>
						<h3 class="post-sub-title"><?php print $subtitle;?></h3>
		<?php endif;?>				
<?php endif;?>
						<div class="post-article">
<!-- start content -->
<?php the_content(); 
	wp_link_pages( detheme_get_link_pages_args() );
?>
<!-- end content -->
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
<?php
get_footer();
?>