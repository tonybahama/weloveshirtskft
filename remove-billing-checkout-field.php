/* Remove Checkout Fields */
//reference: https://www.wpmayor.com/how-to-remove-the-billing-details-from-woocommerce-checkout/
//Only for HUNGARIAN site!

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields55' );

function custom_override_checkout_fields55( $fields ) {

unset($fields['billing']['billing_state']);
return $fields;
}
