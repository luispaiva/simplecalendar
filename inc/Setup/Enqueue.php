<?php

namespace SimpleCalendar\Setup;

class Enqueue
{
    private static $class;

    public static function get_instance()
    {
        if (self::$class == null) {
            self::$class = new self();
        }
        return self::$class;
    }

    private function __construct()
    {
        add_action("admin_enqueue_scripts", array($this, "admin_enqueue_scripts"));
    }

    public static function admin_enqueue_scripts()
    {
        $screens = array(
            "toplevel_page_simple-calendar"
        );

        if (!in_array(get_current_screen()->id, $screens))
            return;

        // CSS
        wp_enqueue_style("fullcalendar", SC_PLUGIN_URL . "node_modules/fullcalendar/dist/fullcalendar.min.css", array(), "3.10.1", false);
        wp_enqueue_style("toastr", SC_PLUGIN_URL . "node_modules/toastr/build/toastr.min.css", array(), "3.10.1", false);

        wp_enqueue_style("style", SC_PLUGIN_URL . "assets/css/style.css", array(), "1.0.0", false);

        // Scripts
        wp_deregister_script("jquery");
        wp_register_script("jquery", SC_PLUGIN_URL . "node_modules/jquery/dist/jquery.min.js", "3.4.1", true);
        wp_enqueue_script("jquery");

        wp_enqueue_script("moment", SC_PLUGIN_URL . "node_modules/moment/min/moment.min.js", array("jquery"), "2.10.0", true);
        wp_enqueue_script("fullcalendar", SC_PLUGIN_URL . "node_modules/fullcalendar/dist/fullcalendar.min.js", array("jquery", "moment"), "3.10.1", true);
        wp_enqueue_script("locale", SC_PLUGIN_URL . "node_modules/fullcalendar/dist/locale-all.js", array("jquery"), "3.10.1", true);
        wp_enqueue_script("toastr", SC_PLUGIN_URL . "node_modules/toastr/build/toastr.min.js", array(), "", true);

        wp_enqueue_script("calendar", SC_PLUGIN_URL . "assets/js/calendar.js", array("jquery"), time(), true);

        wp_localize_script("calendar", "events", array(
            'ajax'  => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ajax-nonce')
        ));
    }
}
