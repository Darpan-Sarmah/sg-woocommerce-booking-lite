'<?php

class SG_Booking_REST_API {
    public function __construct() {
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    public function register_routes() {
        // Endpoint for bookings
        register_rest_route('sg-booking/v1', '/bookings', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_bookings'),
        ));
        register_rest_route('sg-booking/v1', '/bookings', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_booking'),
            'permission_callback' => '__return_true',
        ));
        // More booking endpoints can be added here

        // Endpoint for services
        register_rest_route('sg-booking/v1', '/services', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_services'),
        ));
        register_rest_route('sg-booking/v1', '/services', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_service'),
            'permission_callback' => '__return_true',
        ));
        // More service endpoints can be added here
    }

    public function get_bookings(WP_REST_Request $request) {
        // Logic to get bookings
        return new WP_REST_Response('Getting bookings', 200);
    }

    public function create_booking(WP_REST_Request $request) {
        // Logic to create a booking
        return new WP_REST_Response('Booking created', 201);
    }

    public function get_services(WP_REST_Request $request) {
        // Logic to get services
        return new WP_REST_Response('Getting services', 200);
    }

    public function create_service(WP_REST_Request $request) {
        // Logic to create a service
        return new WP_REST_Response('Service created', 201);
    }
}

// Initialize the REST API class.
new SG_Booking_REST_API();
'