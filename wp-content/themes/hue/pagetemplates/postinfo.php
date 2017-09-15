<?php
defined('ABSPATH') or die();
?>
						<div class="postinfo">
							<?php $categories = get_the_category_list(', '); ?>
							<?php if (!empty($categories)) : ?>
							<div class="blog_info_categories"><?php echo wp_kses_data($categories); ?></div>
							<?php endif;  ?>
						</div>