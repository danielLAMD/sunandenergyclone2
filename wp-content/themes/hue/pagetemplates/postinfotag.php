<?php
defined('ABSPATH') or die();
?>
						<ul class="author_date_tags">
							<li class="blog_info_author"><?php the_author_link(); ?></li>
						<?php 
							$date = get_the_date();
							if (!empty($date)) :
						?>
							<li class="blog_info_date"><?php print wp_kses_data($date);?></li>
						<?php
							endif;
						?>
							
						<?php 
							$tags = get_the_tag_list(' ',', ','');
							if (!empty($tags)) :
						?>
							<li class="blog_info_tags"><?php echo wp_kses_data($tags); ?></li>
						<?php
							endif;
						?>

						</ul>
