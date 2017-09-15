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

$sidebar_position = get_detheme_sidebar_position();	
$sidebar= $sidebar_position=='fullwidth' ? "fullwidth": is_active_sidebar( 'shop-sidebar' )?'shop-sidebar':false;
if(!$sidebar){
	$sidebar_position = "nosidebar";
}

set_query_var('sidebar',$sidebar);
?>

<div class="content">
<div class="<?php echo sanitize_html_class($sidebar_position);?>">
<?php if($sidebar_position != 'fullwidth'):?>
	<div class="container"> 
<?php endif;?>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'){?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
		<?php	} ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<div class="postcontent">
							<?php woocommerce_content(); ?>
						</div>
					</div>
				</div>

			</article>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'):?>
</div>
<?php endif;?>
		<?php if ('sidebar-right'==$sidebar_position) { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar">
				<?php get_sidebar(); ?>
			</div></div>
		<?php }
		elseif ($sidebar_position=='sidebar-left') { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar col-sm-pull-8 col-md-pull-9">
				<?php get_sidebar(); ?>
			</div></div>
		<?php }?>
<?php if($sidebar_position != 'fullwidth'):?>
	</div>
<?php endif;?>
</div><!-- .woocommerce -->
</div>
<?php
get_footer();
?>