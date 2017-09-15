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
<?php 

get_template_part('pagetemplates/scrollingsidebar');

$sidebar=is_active_sidebar( 'detheme-sidebar' )?'detheme-sidebar':false;
$sidebar_position=get_detheme_sidebar_position();

if(!$sidebar){
	$sidebar_position = "nosidebar";
}

set_query_var('sidebar',$sidebar);
$vertical_menu_container_class = get_detheme_option('dt-header-type')=='leftbar' ? " vertical_menu_container":"";
?>
<div class="content <?php print sanitize_html_class($sidebar_position).' '.sanitize_html_class($vertical_menu_container_class);?>">
	<?php if($sidebar_position!='fullwidth'):?>
	<div class="container">
		<div class="row">
	<?php endif;?>		
<?php if ($sidebar_position=='nosidebar' || $sidebar_position=='fullwidth') { ?>
			<div class="col-xs-12">
<?php	} else { ?>
			<div class="col-xs-12 col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
<?php	} ?>
<?php
			if (get_detheme_option('blog_type')=='masonry') {
				get_template_part( 'blog', 'masonry' );
			} else {
				get_template_part( 'blog', 'none' );
			}
?>
			</div>
<?php if ('sidebar-right'==$sidebar_position) { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar">
				<?php get_sidebar(); ?>
			</div>
<?php }
	elseif ($sidebar_position=='sidebar-left') { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar col-sm-pull-8 col-md-pull-9">
				<?php get_sidebar(); ?>
			</div>
<?php }?>
<?php if($sidebar_position!='fullwidth'):?>
		</div>			
	</div>
<?php endif;?>	
</div>
<?php
get_footer();
?>