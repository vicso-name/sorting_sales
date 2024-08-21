<?php
/**
 * WooCommerce Sales Sorting Filter
 */

// Hook into the catalog ordering arguments filter
add_filter( 'woocommerce_get_catalog_ordering_args', 'wcs_get_catalog_ordering_args' );

function wcs_get_catalog_ordering_args( $args ) {
    // Get the current orderby value from query string or fallback to default orderby option
    $orderby_value = isset( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    
    // If 'on_sale' is selected, modify the query arguments to sort by the sale price
    if ( 'on_sale' === $orderby_value ) {
        $args['orderby'] = 'meta_value_num';
        $args['order']   = 'DESC';
        $args['meta_key'] = '_sale_price';
    }
    
    return $args;
}

// Add 'Sort by on sale' option to the ordering dropdown
add_filter( 'woocommerce_default_catalog_orderby_options', 'wcs_add_catalog_orderby_option' );
add_filter( 'woocommerce_catalog_orderby', 'wcs_add_catalog_orderby_option' );

function wcs_add_catalog_orderby_option( $sortby ) {
    $sortby['on_sale'] = __( 'Sort by on sale', 'your-text-domain' ); // Add text domain for localization
    return $sortby;
}
