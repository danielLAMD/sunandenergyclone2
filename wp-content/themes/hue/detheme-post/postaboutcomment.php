<?php
defined('ABSPATH') or die();

if(comments_open()):
?>
	<div class="comment-count">
		<h3><?php comments_number(esc_html__('No Comments','hue'),esc_html__('1 Comment','hue'),esc_html__('% Comments','hue')); ?></h3>
	</div>

	<div class="section-comment">
		<?php comments_template('/comments.php', true); ?>
	</div><!-- Section Comment -->
<?php endif;?>
