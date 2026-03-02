<?php

class SG_Booking_Sanitizer {

    public static function sanitize_text($text) {
        return filter_var($text, FILTER_SANITIZE_STRING);
    }

    public static function sanitize_email($email) {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function sanitize_integer($integer) {
        return filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function sanitize_float($float) {
        return filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    public static function sanitize_array($array) {
        return array_map('self::sanitize_text', $array);
    }

    public static function sanitize_service_data($service_data) {
        // Assuming $service_data is an associative array
        foreach ($service_data as $key => $value) {
            if (is_array($value)) {
                $service_data[$key] = self::sanitize_array($value);
            } else {
                $service_data[$key] = self::sanitize_text($value);
            }
        }
        return $service_data;
    }

    public static function sanitize_booking_data($booking_data) {
        // Assuming $booking_data is an associative array
        foreach ($booking_data as $key => $value) {
            if (is_array($value)) {
                $booking_data[$key] = self::sanitize_array($value);
            } elseif (is_numeric($value)) {
                $booking_data[$key] = self::sanitize_float($value);
            } else {
                $booking_data[$key] = self::sanitize_text($value);
            }
        }
        return $booking_data;
    }

}

?>