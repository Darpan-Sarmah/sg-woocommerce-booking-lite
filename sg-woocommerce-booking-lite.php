<?php
/**
 * Plugin Name: SG WooCommerce Booking Lite
 * Plugin URI: https://example.com/sg-woocommerce-booking-lite
 * Description: A lightweight WooCommerce booking plugin.
 * Version: 1.0.0
 * Author: Darpan Sarmah
 * Author URI: https://example.com
 * License: GPL2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Activation hook
function sg_woocommerce_booking_lite_activate() {
    // Code to run on plugin activation
}
register_activation_hook( __FILE__, 'sg_woocommerce_booking_lite_activate' );

// Deactivation hook
function sg_woocommerce_booking_lite_deactivate() {
    // Code to run on plugin deactivation
}
register_deactivation_hook( __FILE__, 'sg_woocommerce_booking_lite_deactivate' );

// Core initialization
function sg_woocommerce_booking_lite_init() {
    // Initialization code here
}
add_action( 'plugins_loaded', 'sg_woocommerce_booking_lite_init' );
?>