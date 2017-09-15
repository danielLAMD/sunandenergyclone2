<?php
defined('ABSPATH') or die();

$categories = get_the_category_list(', ');

if (!empty($categories)) : ?>

<div class="blog_info_categories"><?php echo wp_kses_data($categories); ?></div>

<?php endif;  ?>