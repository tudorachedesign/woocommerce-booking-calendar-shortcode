<?php
/**
 * Booking product add to cart - Shortcode version
 *
 * This template can be overridden by copying it to yourtheme/woocommerce-bookings/single-product/add-to-cart/booking.php
 *
 * @see     https://woocommerce.com/document/introduction-to-woocommerce-bookings/pages-and-emails-customization/
 * @author  Automattic
 * @version 1.10.0
 * @since   1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;
if ( ! $product->is_purchasable() ) {
	return;
}

$nonce = wp_create_nonce( 'find-booked-day-blocks' );

// Save the form in a global variable for the shortcode
global $wc_bookings_form_html;

ob_start();
?>
<noscript><?php esc_html_e( 'Your browser must support JavaScript in order to make a booking.', 'woocommerce-bookings' ); ?></noscript>
<form class="cart" method="post" enctype='multipart/form-data' data-nonce="<?php echo esc_attr( $nonce ); ?>">
	<div id="wc-bookings-booking-form" class="wc-bookings-booking-form" style="display:none">
		<?php do_action( 'woocommerce_before_booking_form' ); ?>
		<?php $booking_form->output(); ?>
		<div class="wc-bookings-booking-cost price" style="display:none" data-raw-price=""></div>
	</div>
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( is_callable( array( $product, 'get_id' ) ) ? $product->get_id() : $product->id ); ?>" class="wc-booking-product-id" />
	<button type="submit" class="wc-bookings-booking-form-button single_add_to_cart_button button alt disabled" style="display:none"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
	<input type="hidden" id="min_date" name="min_date" value="0"/>
	<input type="hidden" id="max_date" name="max_date" value="0"/>
	<input type="hidden" id="timezone_offset" name="timezone_offset" value="0"/>
	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>
<?php
$wc_bookings_form_html = ob_get_clean();

// Do not display anything in the original position
do_action( 'woocommerce_before_add_to_cart_form' );
do_action( 'woocommerce_after_add_to_cart_form' );
?>

<script>
jQuery(document).ready(function($) {
	// Make sure the form in the shortcode is visible
	setTimeout(function() {
		$('.wc-bookings-shortcode-wrapper .wc-bookings-booking-form').show();
		$('.wc-bookings-shortcode-wrapper .single_add_to_cart_button').show();
	}, 100);
});
</script>
