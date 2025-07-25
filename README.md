# WooCommerce Bookings Form Shortcode

A simple solution to display the WooCommerce Bookings form anywhere on your product page using a shortcode.

## Description

This modification allows you to move the WooCommerce Bookings calendar and booking form from its default position (near the add to cart button) to any location on your product page or even on other pages using a simple shortcode.

## Features

- Move the booking form to any location using `[booking_calendar]` shortcode
- No additional styling - maintains original WooCommerce Bookings appearance
- Preserves all original functionality (AJAX, validation, pricing calculations)
- Compatible with WooCommerce Bookings 1.10.0+
- Can display booking forms from other products using product ID

## Installation

### Method 1: Template Override

1. Create the following directory structure in your theme:
   ```
   your-theme/
   └── woocommerce-bookings/
       └── templates/
           └── single-product/
               └── add-to-cart/
                   └── booking.php
   ```

2. Copy the modified `booking.php` file into this directory

3. Add the shortcode function to your theme's `functions.php` file

### Method 2: Child Theme (Recommended)

1. If using a child theme, create the same directory structure in your child theme folder
2. Add the code to your child theme's `functions.php`

## Usage

### Basic Usage
Place this shortcode wherever you want the booking form to appear:
```
[booking_calendar]
```

### Display a Specific Product's Booking Form
```
[booking_calendar product_id="123"]
```

### Example Implementations

#### In Product Description
```html
<h2>Book Your Adventure</h2>
<p>Select your preferred date and time below:</p>

[booking_calendar]

<h2>Important Information</h2>
<p>Please arrive 15 minutes before your scheduled time...</p>
```

#### In a Custom Tab
```php
// Add to functions.php
add_filter( 'woocommerce_product_tabs', 'add_booking_tab' );
function add_booking_tab( $tabs ) {
    $tabs['booking'] = array(
        'title'    => __( 'Book Now', 'woocommerce' ),
        'priority' => 50,
        'callback' => 'booking_tab_content'
    );
    return $tabs;
}

function booking_tab_content() {
    echo do_shortcode('[booking_calendar]');
}
```

#### In a Separate Section
```html
<div id="availability">
    [booking_calendar]
</div>
```

## File Structure

```
├── booking.php          # Modified template file
├── functions.php        # Shortcode registration code
└── README.md           # This file
```

## Requirements

- WordPress 4.0+
- WooCommerce 3.0+
- WooCommerce Bookings 1.10.0+
- PHP 5.6+

## Compatibility

- Tested with WooCommerce Bookings 1.10.0 - 1.15.0
- Compatible with most WordPress themes
- Works with WPML and other multilingual plugins

## Troubleshooting

### Form Not Showing
- Ensure JavaScript is enabled in your browser
- Check that the product is set as a "Bookable Product"
- Verify the product is purchasable

### Styling Issues
- The form uses default WooCommerce Bookings styles
- Check for theme CSS conflicts
- Ensure WooCommerce Bookings CSS is loading properly

### JavaScript Errors
- Check browser console for errors
- Ensure jQuery is loaded
- Verify no plugin conflicts

## Changelog

### 1.0.0
- Initial release
- Basic shortcode functionality
- Support for product_id parameter

## Support

For support with WooCommerce Bookings, please refer to:
- [WooCommerce Documentation](https://woocommerce.com/document/bookings/)
- [WooCommerce Support](https://woocommerce.com/support/)

## License

This code modification follows the same license as your WordPress theme and WooCommerce Bookings plugin.

## Contributing

Feel free to submit issues, fork the repository, and create pull requests for any improvements.

## Credits

Created for WooCommerce Bookings plugin by Ionut Tudorache 
https://tudorachedesign.it/
