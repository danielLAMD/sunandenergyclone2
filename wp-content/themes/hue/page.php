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
 * @subpackage Hue
 * @since Hue 1.0
 */

get_header();?>

<?php get_template_part('pagetemplates/scrollingsidebar'); ?>
<?php 

$sidebar_position=get_detheme_sidebar_position();
$sidebar= $sidebar_position=='fullwidth' ? "fullwidth": (is_active_sidebar( 'detheme-sidebar' )?'detheme-sidebar':false);

if(!$sidebar){
	$sidebar_position = "nosidebar";
}
set_query_var('sidebar',$sidebar);
?>
<div class="content <?php print (get_detheme_option('dt-header-type')=='leftbar')?" vertical_menu_container":"";?>">
<div class="<?php echo sanitize_html_class($sidebar_position);?>">
<?php if($sidebar_position != 'fullwidth'):?>
	<div class="container"> 
<?php endif;?>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'):?>
	<div class="row">
			<div class="col-xs-12 col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
<?php endif;?>
<?php 
while ( have_posts() ) : ?>
	<?php if(get_detheme_option('dt-show-title-page')):?>
	<h1 class="page-title"><?php print get_detheme_option('page-title');?></h1>
	<?php endif;?>

	<div class="blank-reveal-area"></div>
<?php the_post();?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<div class="postcontent">
<?php the_content(); 
	wp_link_pages( detheme_get_link_pages_args() );
?>
							</div>

<?php
	if(comments_open()):?><?php if($sidebar_position == 'fullwidth'):?>
								<div class="container">
								<?php endif;?>
							<div class="comment-count">
								<h3><?php comments_number(esc_html__('No Comments','hue'),esc_html__('1 Comment','hue'),esc_html__('% Comments','hue')); ?></h3>
							</div>

							<div class="section-comment">
								<?php comments_template('/comments.php', true); ?>
							</div><!-- Section Comment -->
						<?php if($sidebar_position == 'fullwidth'):?></div><?php endif;?>
<?php endif;?>

						</div>
					</div>

					</article>
<?php endwhile; ?>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'):?>
</div>
<?php endif;?>
<?php if ('sidebar-right'==$sidebar_position) { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar">
				<?php get_sidebar(); ?>
			</div></div>
<?php }
	elseif ($sidebar_position=='sidebar-left') {?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar col-sm-pull-8 col-md-pull-9">
				<?php get_sidebar(); ?>
			</div></div>
<?php }?>

<?php if($sidebar_position != 'fullwidth'):?>
	</div>
<?php endif;?>
<!-- .container -->
</div><!-- .page -->
</div>

<?php
get_footer();
?>