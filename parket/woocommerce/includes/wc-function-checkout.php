<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


add_filter( 'woocommerce_billing_fields' , 'custom_override_billing_fields' );

function custom_override_billing_fields( $fields ) {
  // unset($fields['billing_first_name']);
  unset($fields['billing_last_name']);
  // unset($fields['billing_phone']);
  // unset($fields['billing_email']);
  unset($fields['billing_company']);
  // unset($fields['billing_address_2']);
  unset($fields['billing_state']);
  // unset($fields['billing_country']);
  unset($fields['billing_postcode']);
  return $fields;
}