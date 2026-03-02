<?php

class SG_Booking_Public {

    public function __construct() {
        // Add shortcodes
        add_shortcode('sg_booking_form', [$this, 'render_booking_form']);
        add_shortcode('sg_services_list', [$this, 'render_services_list']);
        add_shortcode('sg_my_bookings', [$this, 'render_my_bookings']);
        
        // Register REST API endpoints
        add_action('rest_api_init', function () {
            register_rest_route('sg-booking/v1', '/bookings', array(
                'methods' => 'GET',
                'callback' => [$this, 'get_bookings'],
                'permission_callback' => function () {
                    return is_user_logged_in();
                }
            ));
        });
    }

    public function render_booking_form() {
        // Code to render the booking form
        ob_start();
        // Form HTML goes here
        echo '<form id="booking-form">';
        echo '<input type="text" name="date" required />';
        echo '<input type="text" name="time" required />';
        echo '<input type="submit" value="Book Now" />';
        echo '</form>';
        return ob_get_clean();
    }

    public function render_services_list() {
        // Code to render the services list
        $services = get_services(); // Assume get_services() fetches services
        ob_start();
        echo '<ul class="services-list">';
        foreach ($services as $service) {
            echo '<li>' . esc_html($service->name) . '</li>';
        }
        echo '</ul>';
        return ob_get_clean();
    }

    public function render_my_bookings() {
        // Code to render user's bookings
        $bookings = $this->get_user_bookings(get_current_user_id());
        ob_start();
        echo '<h2>My Bookings</h2>';
        if (!empty($bookings)) {
            echo '<ul>'; 
            foreach ($bookings as $booking) {
                echo '<li>' . esc_html($booking->details) . '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No bookings found.</p>';
        }
        return ob_get_clean();
    }

    public function get_bookings(WP_REST_Request $request) {
        $user_id = get_current_user_id();
        // Fetch user bookings
        $bookings = $this->get_user_bookings($user_id);
        return rest_ensure_response($bookings);
    }

    private function get_user_bookings($user_id) {
        // Code to retrieve bookings for a specific user
        // Query to fetch user bookings from the database
        return []; // placeholder for bookings
    }
}

// Initialize the class
new SG_Booking_Public();

?>