
//Hide coupon field on cart page
//Reference: https://www.sellwithwp.com/rename-hide-coupon-code-field-woocommerce/

function hide_coupon_field_on_cart( $enabled ) {
	if ( is_cart() ) {
		$enabled = false;
	}
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_cart' );

//Hide coupon field until the link is clicked
function skyverge_show_coupon_js() {
	wc_enqueue_js( '
		$( "a.showcoupon" ).parent().hide();
		
		$( "body" ).bind( "updated_checkout", function() {
			$( "#show-coupon-form" ).click( function() {
				$( ".checkout_coupon" ).show();
				$( "html, body" ).animate( { scrollTop: 0 }, "slow" );
  				return false;
			} );
		} );
	');
}


add_action( 'woocommerce_before_checkout_form', 'skyverge_show_coupon_js' );
/**
 * Show a coupon link above the order details.
**/
function skyverge_show_coupon() {
	echo '<p style="padding: 0 15px;"> Van kuponod? <a href="#" id="show-coupon-form">Kattints ide az érvényesítéshez!</a>.</p>';
}
add_action( 'woocommerce_checkout_after_customer_details', 'skyverge_show_coupon' );
// you could use instead:
// add_action( 'woocommerce_checkout_order_review', 'skyverge_show_coupon' );
// adds link after order review table, before payment methods
