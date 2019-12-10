<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'woocommerce_billing_fields', 'estore_woocommerce_custom_checkout_billing_fields', 10, 2 );
function estore_woocommerce_custom_checkout_billing_fields( $address_fields, $country ) {
	$address_fields['billing_phone']['class']     = array( 'form-row-first' );
	$address_fields['billing_email']['class']     = array( 'form-row-last' );
	return $address_fields;
}