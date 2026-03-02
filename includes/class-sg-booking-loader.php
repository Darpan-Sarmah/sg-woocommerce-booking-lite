<?php

class SG_Booking_Loader {

    private static $actions = array();
    private static $filters = array();

    public static function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1) {
        self::$actions[] = array(
            'hook'           => $hook,
            'component'      => $component,
            'callback'       => $callback,
            'priority'       => $priority,
            'accepted_args'  => $accepted_args,
        );
    }

    public static function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1) {
        self::$filters[] = array(
            'hook'           => $hook,
            'component'      => $component,
            'callback'       => $callback,
            'priority'       => $priority,
            'accepted_args'  => $accepted_args,
        );
    }

    public static function run() {
        foreach (self::$actions as $action) {
            add_action(
                $action['hook'],
                array($action['component'], $action['callback']),
                $action['priority'],
                $action['accepted_args']
            );
        }

        foreach (self::$filters as $filter) {
            add_filter(
                $filter['hook'],
                array($filter['component'], $filter['callback']),
                $filter['priority'],
                $filter['accepted_args']
            );
        }
    }
}
?>