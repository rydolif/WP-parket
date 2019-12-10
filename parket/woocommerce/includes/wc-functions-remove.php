<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);



// //----------------------------------------category---------------------------------------
// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);




// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);




// //----------------------------------------archive---------------------------------------
// remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);







