<?php

namespace SimpleCalendar;

use SimpleCalendar\Ajax\Events;
use SimpleCalendar\Custom\CustomFields;
use SimpleCalendar\Custom\PostTypes;
use SimpleCalendar\Setup\Menu;
use SimpleCalendar\Setup\Enqueue;

class Init
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
        Menu::get_instance();
        Enqueue::get_instance();
        PostTypes::get_instance();
        Events::get_instance();
        CustomFields::get_instance();
    }
}
