<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product = detheme_get_global_var('product');
$woocommerce_loop = detheme_get_global_var('woocommerce_loop');

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) {
	return;
} else {
	$upsells_per_page = 4;
	if ( empty( $woocommerce_loop['columns'] ) ) {
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
		$upsells_per_page = $woocommerce_loop['columns'];
		detheme_set_global_var('woocommerce_loop',$woocommerce_loop);
	}
	//$classes = 'noofcolumn' . $upsells_per_page;
	$classes = 'columns-' . $upsells_per_page;
/*
	if (sizeof( $upsells ) > $upsells_per_page) {
		$upsells = array_slice(0,$upsells_per_page);
	}
*/
}

$meta_query = WC()->query->get_meta_query();

// Compatibility with Woocommerce 3.x
if (method_exists($product,'get_id')) {
	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => $posts_per_page,
		'orderby'             => $orderby,
		'post__in'            => $upsells,
		'post__not_in'        => array( $product->get_id() ),
		'meta_query'          => $meta_query
	);
} else {
	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => $posts_per_page,
		'orderby'             => $orderby,
		'post__in'            => $upsells,
		'post__not_in'        => array( $product->id ),
		'meta_query'          => $meta_query
	);
}

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;
detheme_set_global_var('woocommerce_loop',$woocommerce_loop);

if ( $products->have_posts() ) : ?>

	<!--div class="upsells products <?php echo esc_attr($classes); ?>"-->

		<h2><?php esc_html_e( 'You may also like&hellip;', 'hue' ) ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	<!--/div-->

<?php endif;

wp_reset_postdata();
