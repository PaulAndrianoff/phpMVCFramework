<?php
namespace app\helpers;

use core\Config;

class TemplateHelper {
    public static function formatDate($date, $format = 'Y-m-d') {
        return date($format, strtotime($date));
    }

    public static function formatLabel($label) {
        return ucfirst(htmlspecialchars($label, ENT_QUOTES, 'UTF-8'));
    }

    public static function escapeHtml($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public static function getLink($link) {
        return Config::get('app.base_url') . $link;
    }

    public static function getAppName() {
        return Config::get('app.app_name');
    }
}