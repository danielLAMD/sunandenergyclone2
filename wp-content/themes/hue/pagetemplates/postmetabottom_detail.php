<?php
defined('ABSPATH') or die();
?>
					<div class="postmetabottom">
						<div class="row">
							<?php if(is_rtl()):?>
							<div class="col-xs-12 text-left blog_info_share">
								<?php get_template_part('pagetemplates/social','share'); ?>
							</div>
							<?php else:?>
							<div class="col-xs-12 text-right blog_info_share">
								<?php get_template_part('pagetemplates/social','share'); ?>
							</div>
							<?php endif;?>
						</div>

						<div class="row">
							<div class="col-xs-12 text-<?php print is_rtl()?"left":"right";?> blog_info_comments">
<?php if(comments_open()):?>
									<?php comments_number(esc_html__('No Comments','hue'),esc_html__('1 Comment','hue'),esc_html__('% Comments','hue')); ?>
<?php endif;?>
							</div>
						</div>

					</div>


