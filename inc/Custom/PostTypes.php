<?php

namespace SimpleCalendar\Custom;

/**
 * Custom Post Types
 */
class PostTypes
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
        add_action("init", array($this, "custom_post_types"));
    }

    public static function custom_post_types()
    {
        $labels = array(
            'name'                  => __('Eventos', 'Post type general name', 'simplecalendar'),
            'singular_name'         => __('Evento', 'Post type singular name', 'simplecalendar'),
            'menu_name'             => __('Eventos', 'Admin Menu text', 'simplecalendar'),
            'name_admin_bar'        => __('Eventos', 'Add New on Toolbar', 'simplecalendar'),
            'add_new'               => __('Adicionar', 'simplecalendar'),
            'add_new_item'          => __('Adicionar novo evento', 'simplecalendar'),
            'new_item'              => __('Novo evento', 'simplecalendar'),
            'edit_item'             => __('Editar Evento', 'simplecalendar'),
            'view_item'             => __('Visualizar evento', 'simplecalendar'),
            'all_items'             => __('Todos os eventos', 'simplecalendar'),
            'search_items'          => __('Pesquisar', 'simplecalendar'),
        );
        $args = array(
            'labels'                => $labels,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array('slug' => 'event'),
            'capability_type'       => 'event',
            'map_meta_cap'          => true,
            'has_archive'           => true,
            'hierarchical'          => false,
            'menu_position'         => null,
            'menu_icon'             => "dashicons-clock",
            'supports'              => array('title'),
            'rest_base'             => "event",
            'rest_controller_class' => "WP_REST_Posts_Controller",
        );

        register_post_type("event", $args);
    }
}
