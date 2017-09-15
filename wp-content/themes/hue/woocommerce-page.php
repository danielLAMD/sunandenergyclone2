<?php
defined('ABSPATH') or die();

/**
 * Template Name: Woocommerce Page
 *
 * Used for single page.
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */

get_header();

get_template_part('pagetemplates/scrollingsidebar');

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

<?php 
while ( have_posts() ) : 	?>
	<div class="blank-reveal-area"></div>
	<?php 
	the_post();
?>
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
							</div>
							<?php if($sidebar_position == 'fullwidth'):?>
								</div>
								<?php endif;?>
<?php endif;?>
					</div>
				</div>

			</article>
<?php endwhile;?>
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