<?php
/**
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
defined('ABSPATH') or die();
if (get_detheme_option('show-author') && get_the_author_meta( 'description' )!='') :
?>
							<div class="about-author bg_gray_3">
								<div class="media">
									<div class="pull-<?php print is_rtl()?"right":"left";?> text-center">
										<?php 
											$avatar_url = detheme_get_avatar_url(get_avatar( get_the_author_meta( 'ID' ), 130 )); 
											if (isset($avatar_url)) {
										?>					
										<img src="<?php echo esc_url($avatar_url); ?>" class="author-avatar img-responsive img-circle" alt="<?php echo esc_attr(get_the_author_meta( 'nickname' )); ?>">
										<?php 
											} 
										?>											
									</div>
									<div class="media-body">
										<h4><?php echo sprintf(esc_html__('About %s','hue'),get_the_author_meta( 'nickname' )); ?></h4>
										<?php echo get_the_author_meta( 'description' ); ?>
									</div>
								</div>
							</div>

<?php 
endif; 

if(comments_open()):?>
	<div class="comment-count">
		<h3><?php comments_number(esc_html__('No Comments','hue'),esc_html__('1 Comment','hue'),esc_html__('% Comments','hue')); ?></h3>
	</div>
<?php endif;?>

	<div class="section-comment">
		<?php comments_template('/comments.php', true); ?>
	</div><!-- Section Comment -->
