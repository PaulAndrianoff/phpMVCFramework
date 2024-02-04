<?php
namespace app\helpers;

class TemplateFunctions {
    public static function formatDate($date, $format = 'Y-m-d') {
        return date($format, strtotime($date));
    }

    public static function escapeHtml($string) {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    public static function test() {
        return 'Hello World';
    }

    // Add more template functions as needed
}