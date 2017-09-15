<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */



if (is_woocommerce()) :
$dt_columns = 3;

//if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
	detheme_set_global_var('woocommerce_loop',$woocommerce_loop);
	$dt_columns = $woocommerce_loop['columns'];
//}
$classes = 'columns-' . $dt_columns;
?>


<div class="woocommerce <?php echo esc_attr($classes); ?>">

<?php endif; //if (is_woocomerce())?>

<ul class="products">