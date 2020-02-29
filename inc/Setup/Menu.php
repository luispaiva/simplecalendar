<?php

namespace SimpleCalendar\Setup;

class Menu
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
        add_action("admin_menu", array($this, "admin_menu"));
    }

    public function admin_menu()
    {
        add_menu_page(
            esc_attr__("Agenda", "simplecalendar"),
            esc_attr__("Agenda", "simplecalendar"),
            "manage_options",
            "simple-calendar",
            function () {
                include_once(SC_PLUGIN_PATH . "/views/page-calendar.php");
            },
            "dashicons-calendar-alt",
            30
        );
    }
}
