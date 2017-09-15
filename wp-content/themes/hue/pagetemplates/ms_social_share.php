<?php defined('ABSPATH') or die();?>
<?php if(is_rtl()):?>
	<a href="https://plus.google.com/share" data-url="<?php echo esc_url(get_permalink()); ?>"><span class="icon-social-google109"></span></a>
	<a href="https://twitter.com/intent/tweet" data-url="<?php echo esc_url(get_permalink()); ?>"><span class="icon-social-twitter35"></span></a>
	<a href="https://www.facebook.com/sharer/sharer.php" data-url="<?php echo esc_url(get_permalink()); ?>"><span><i class="icon-social-facebook43"></i></span></a>
<?php else:?>
	<a href="https://www.facebook.com/sharer/sharer.php" data-url="<?php echo esc_url(get_permalink()); ?>"><span><i class="icon-social-facebook43"></i></span></a>
	<a href="https://twitter.com/intent/tweet" data-url="<?php echo esc_url(get_permalink()); ?>"><span class="icon-social-twitter35"></span></a>
	<a href="https://plus.google.com/share" data-url="<?php echo esc_url(get_permalink()); ?>"><span class="icon-social-google109"></span></a>
<?php endif;?>