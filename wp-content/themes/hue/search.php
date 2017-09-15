<?php
defined('ABSPATH') or die();
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */

get_header();

get_template_part('pagetemplates/scrollingsidebar');


$sidebar_position=get_detheme_sidebar_position();
$sidebar= $sidebar_position=='fullwidth' ? "fullwidth": (is_active_sidebar( 'detheme-sidebar' )?'detheme-sidebar':false);

if(!$sidebar){
	$sidebar_position = "nosidebar";
}

set_query_var('sidebar',$sidebar);
?>

<div class="content">
<div class="<?php echo sanitize_html_class($sidebar_position);?>">
	<div class="container">
		<div class="row">
<?php if ($sidebar_position=='nosidebar') { ?>
			<div class="col-sm-12">
<?php	} else { ?>
			<div class="col-sm-8 <?php print ($sidebar_position=='sidebar-left')?" col-sm-push-4":"";?> col-md-9 <?php print ($sidebar_position=='sidebar-left')?" col-md-push-3":"";?>">
<?php	} ?>
				<header class="archive-header">

				<h2 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'hue' ), get_search_query() ); ?></h2>
				</header>
<?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();

						//the_content();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'post'==get_post_type()?get_post_format():"");
					?>
					<div class="clearfix">
						<div class="col-xs-12 postseparator"></div>
					</div>
					<?php
					endwhile;
					// Previous/next post navigation.
					//twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
?>
				<!-- Pagination -->
				<div class="row">
					<?php get_template_part('pagetemplates/pagination'); ?>
				</div>
				<!-- /Pagination -->
				
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
</div>
<?php
get_footer();
?>