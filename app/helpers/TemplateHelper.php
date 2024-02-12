<?php
namespace app\helpers;

use core\Config;
use core\Translator;
use app\helpers\SessionHelper;

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

    public static function getLink($link, $type = '') {
        if ('external' === $type) {
            return $link;
        } elseif ('file' === $type) {
            return Config::get('app.base_path') . $link;
        }
        return Config::get('app.base_url') . $link;
    }

    public static function getAppName() {
        return Config::get('app.app_name');
    }

    public static function getTrad($key) {
        $userLang = SessionHelper::get('lang');
        $translator = new Translator($userLang);
        return $translator->translate($key);
    }

    public static function getCleanFileName($filename) {
        return str_replace('uploads/', '', $filename);
    }
}