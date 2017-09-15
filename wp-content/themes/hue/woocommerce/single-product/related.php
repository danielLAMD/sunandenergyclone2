<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$relateds_per_page = 4;

//if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
	$relateds_per_page = $woocommerce_loop['columns'];
	detheme_set_global_var('woocommerce_loop',$woocommerce_loop);
//}
//$classes = 'noofcolumn' . $relateds_per_page;
$classes = 'columns-' . $relateds_per_page;

$related = $product->get_related( $relateds_per_page );

//$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

// Compatibility with Woocommerce 3.x
if (method_exists($product,'get_id')) {
	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => $posts_per_page,
		'orderby'              => $orderby,
		'post__in'             => $related,
		'post__not_in'         => array( $product->get_id() )
	) );
} else {
	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => $posts_per_page,
		'orderby'              => $orderby,
		'post__in'             => $related,
		'post__not_in'         => array( $product->id )
	) );
}

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;
detheme_set_global_var('woocommerce_loop',$woocommerce_loop);

if ( $products->have_posts() ) : ?>

	<!--div class="related products <?php echo esc_attr($classes); ?>"-->

		<h2><?php esc_html_e( 'Related Products', 'hue' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	<!--/div-->

<?php endif;

wp_reset_postdata();
