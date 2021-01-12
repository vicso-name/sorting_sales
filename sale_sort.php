<?php
/**
 * WooCommerce Sales Sorting Filter
**/

add_filter( 'woocommerce_get_catalog_ordering_args', 'wcs_get_catalog_ordering_args' );

function wcs_get_catalog_ordering_args( $args )
{
    $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    if ( 'on_sale' == $orderby_value ) {
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        $args['meta_key'] = '_sale_price'; 
    }
    return $args;
}
add_filter( 'woocommerce_default_catalog_orderby_options', 'wcs_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'wcs_catalog_orderby' );
function wcs_catalog_orderby( $sortby ) {
    $sortby['on_sale'] = 'Sort by on sale';
    return $sortby;
}

