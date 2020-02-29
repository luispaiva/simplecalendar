<?php

/**
 * Plugin Name:  Simple Calendar
 * Plugin URI:   https://github.com/luispaiva/simplecalendar/
 * Description:  Plugin desenvolvido para gerenciar eventos direto de um calendário no painel do WordPress.
 * Author:       Luis Fernando de Paiva
 * Author URI:   https://luispaiva.com.br
 * Version:      1.0.0
 * Text Domain:  simplecalendar
 * Domain Path:  languages
 */

defined("ABSPATH") || exit();

if (!defined("SC_PLUGIN_PATH")) {
    define("SC_PLUGIN_PATH", plugin_dir_path(__FILE__));
}

if (!defined("SC_PLUGIN_URL")) {
    define("SC_PLUGIN_URL", plugin_dir_url(__FILE__));
}
if (file_exists(SC_PLUGIN_PATH . '/vendor/autoload.php')) {
    require_once SC_PLUGIN_PATH . '/vendor/autoload.php';
}

SimpleCalendar\Init::get_instance();
