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

get_header(); 

get_template_part('pagetemplates/scrollingsidebar');

$sidebar=is_active_sidebar( 'detheme-sidebar' )?'detheme-sidebar':false;
$sidebar_position= (!$sidebar) ? "nosidebar" : get_detheme_sidebar_position();

set_query_var('sidebar',$sidebar);
$class_sidebar = $sidebar_position;
$vertical_menu_container_class = (get_detheme_option('dt-header-type')=='leftbar')?" vertical_menu_container":"";
?>
<div class="content <?php print sanitize_html_class($class_sidebar)." ".sanitize_html_class($vertical_menu_container_class); ?>">
	<div class="container">
		<div class="row">


<?php if ($sidebar_position=='nosidebar') { ?>
			<div class="col-sm-12">
<?php	} else { ?>
			<div class="col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
<?php	} ?>

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">

<?php if(get_detheme_option('dt-show-title-page')):?>
						<h2 class="category-title"><?php print get_detheme_option('page-title','');?></h2>
		<?php if($subtitle = get_post_meta( get_the_ID(), '_subtitle', true )):?>
						<h3 class="post-sub-title"><?php print $subtitle;?></h3>
		<?php endif;?>				
<?php endif;?>

				<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo wp_kses_data(category_description()); ?></div>
				<?php endif; ?>
			</header>

			<?php 
				$i = 0;
				$reveal_area_class = '';
				while ( have_posts() ) : the_post();
					$i++;
					$reveal_area_class = ($i==1) ? 'blank-reveal-area' : '';
					if ($i==1) :
			?>
						<div class="<?php echo esc_attr($reveal_area_class); ?>"></div>
			<?php endif; //if ($i==1)?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<div class="clearfix">
					<div class="col-xs-12 postseparator"></div>
				</div>
			<?php endwhile; ?>



			<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>	

				<!-- Pagination -->
				<div class="row">
					<?php get_template_part('pagetemplates/pagination'); ?>
				</div>

		</div>
<?php if ('sidebar-right'==$sidebar_position) { ?>
			<div class="col-sm-4 col-md-3 sidebar">
				<?php get_sidebar(); ?>
			</div>
<?php }
	elseif ($sidebar_position=='sidebar-left') { ?>
			<div class="col-sm-4 col-md-3 sidebar col-sm-pull-8 col-md-pull-9">
				<?php get_sidebar(); ?>
			</div>
<?php }?>

		</div>
	</div>
	
</div>	
<?php get_footer(); ?>