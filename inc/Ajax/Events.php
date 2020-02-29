<?php

namespace SimpleCalendar\Ajax;

use WP_Query;

class Events
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
        add_action("wp_ajax_events", array($this, "wp_ajax_events"));
    }

    public static function wp_ajax_events()
    {
        check_ajax_referer("ajax-nonce", "nonce");
        check_admin_referer("ajax-nonce", "nonce");

        $args = array(
            "post_type" => "event"
        );

        $result = new WP_Query($args);
        $events = array();

        if ($result->have_posts()) {
            while ($result->have_posts()) {
                $result->the_post();
                // var_dump(get_post_meta(get_the_ID(), "start", true));
                // die;
                array_push($events, array(
                    "id"            => get_the_ID(),
                    "title"         => get_the_title(),
                    "start"         => date_i18n('c', get_post_meta(get_the_ID(), "start", true)),
                    "end"           => date_i18n('c', get_post_meta(get_the_ID(), "end", true)),
                    "color"         => get_post_meta(get_the_ID(), "color", true),
                    "description"   => get_post_meta(get_the_ID(), "description", true),
                    "url"           => get_post_meta(get_the_ID(), "url", true),
                ));
            }
        }


        $response = array(
            "data" => $events
        );

        wp_send_json($response);
    }
}
