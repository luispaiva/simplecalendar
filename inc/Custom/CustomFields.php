<?php

namespace SimpleCalendar\Custom;

if (file_exists(SC_PLUGIN_PATH . "/inc/plugins/cmb2/init.php")) {
    include_once SC_PLUGIN_PATH . "/inc/plugins/cmb2/init.php";
}

class CustomFields
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
        add_action("cmb2_admin_init", array($this, "post_type_custom_fields"));
    }

    public static function post_type_custom_fields()
    {
        $event = new_cmb2_box(array(
            "id"            => "metabox_event",
            "title"         => esc_html__("Informações do evento", "simplecalendar"),
            "object_types"  => array("event"),
            "show_names"    => true
        ));

        $event->add_field(array(
            "id"            => "start",
            "name"          => esc_html__("Data inicial:", "simplecalendar"),
            "desc"          => esc_html__("Informe a data inicial do evento.", "simplecalendar"),
            "type"          => "text_datetime_timestamp",
            'date_format'   => 'Y-m-d'
        ));

        $event->add_field(array(
            "id"            => "end",
            "name"          => esc_html__("Data final:", "simplecalendar"),
            "desc"          => esc_html__("Informe a data final do evento.", "simplecalendar"),
            "type"          => "text_datetime_timestamp",
            'date_format'   => 'Y-m-d'
        ));

        $event->add_field(array(
            "id"         => "color",
            "name"       => esc_html__("Cor:", "simplecalendar"),
            "desc"       => esc_html__("Informe a cor relacionada ao evento.", "simplecalendar"),
            "type"       => "colorpicker",
            "default"    => "#0073AA",
        ));

        $event->add_field(array(
            "id"         => "description",
            "name"       => esc_html__("Descrição:", "simplecalendar"),
            "desc"       => esc_html__("Informe uma breve descrição relacionada ao evento.", "simplecalendar"),
            "type"       => "textarea_small"
        ));

        $event->add_field(array(
            "id"         => "url",
            "name"       => esc_html__("URL:", "simplecalendar"),
            "desc"       => esc_html__("Informe uma url relacionada ao evento.", "simplecalendar"),
            "type"       => "text_url"
        ));
    }
}
