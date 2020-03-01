<?php

namespace SimpleCalendar\Setup;

class Plugins
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
        add_action('tgmpa_register', array($this, 'register_required_plugins'));
    }

    public function register_required_plugins()
    {
        $plugins = array(
            array(
                'name'      => 'Members',
                'slug'      => 'members',
                'required'  => true,
            )
        );

        $config = array(
            'id'           => 'tgmpa',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'parent_slug'  => 'plugins.php',
            'capability'   => 'install_plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
        );

        tgmpa($plugins, $config);
    }
}
