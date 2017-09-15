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

$sidebar_position=get_detheme_sidebar_position();
$sidebar=$sidebar=is_active_sidebar( 'detheme-sidebar' )?'detheme-sidebar':false;

if($sidebar_position=='fullwidth'){
	$sidebar="fullwidth";	
}

if(!$sidebar){
	$sidebar_position = "nosidebar";
}


set_query_var('sidebar',$sidebar);

$class_sidebar = $sidebar_position;

$class_vertical_menu = '';
if (get_detheme_option('dt-header-type')=='leftbar') {
	$class_vertical_menu = ' vertical_menu_container';
}

?>
<div  class="<?php print sanitize_html_class($class_sidebar).' '.sanitize_html_class($class_vertical_menu); ?>">
<?php if($sidebar_position != 'fullwidth'):?>
	<div class="container"> 
<?php endif;?>
<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'){?>
		<div class="row">
			<div class="col-xs-12 col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
<?php	} ?>
<?php

$i = 0;
while ( have_posts() ) : 
	$i++;
	
	if ($i==1) : ?><div class="<?php echo ($i==1) ? 'blank-reveal-area' : ''; ?>"></div><?php endif; 
	the_post();
	get_template_part('detheme-post/content');
endwhile;

?>

<?php if($sidebar_position == 'sidebar-right' || $sidebar_position=='sidebar-left'):?>
</div>
<?php endif;?>

<?php if ('sidebar-right'==$sidebar_position) { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar">
				<?php get_sidebar(); ?>
			</div></div><!-- .row -->
<?php }	elseif ($sidebar_position=='sidebar-left') { ?>
			<div class="col-xs-12 col-sm-4 col-md-3 sidebar col-sm-pull-8 col-md-pull-9">
				<?php get_sidebar(); ?>
			</div></div><!-- .row -->
<?php }?>

<?php if($sidebar_position != 'fullwidth'):?>
	</div><!-- .container -->
<?php endif;?>
</div><!-- .content -->
<?php
get_footer();
?>