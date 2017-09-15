<?php
defined('ABSPATH') or die();
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Hue
 * @since Hue 1.0
 */
?>
<?php 
if(comments_open()):?>
	<div class="comment-count">
		<h3><?php comments_number(esc_html__('No Comments','hue'),esc_html__('1 Comment','hue'),esc_html__('% Comments','hue')); ?></h3>
	</div>

	<div class="section-comment">
		<?php comments_template('/comments.php', true); ?>
	</div><!-- Section Comment -->
<?php endif;?>
