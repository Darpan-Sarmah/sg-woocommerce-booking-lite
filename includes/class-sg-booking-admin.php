<?php

// Class SG_Booking_Admin handles the admin menu and dashboard
class SG_Booking_Admin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'settings_init'));
    }

    public function add_admin_menu() {
        add_menu_page(
            'SG Booking',
            'SG Booking',
            'manage_options',
            'sg_booking',
            array($this, 'admin_page'),
            'dashicons-admin-generic',
            100
        );
    }

    public function settings_init() {
        // Register settings here
    }

    public function admin_page() {
        echo '<h1>SG Booking Admin Dashboard</h1>';
        // Add dashboard content here
    }
}

// Initialize the class
new SG_Booking_Admin();
