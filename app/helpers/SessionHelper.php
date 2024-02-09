<?php
namespace app\helpers;

use core\Config;

class SessionHelper {
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            self::set('lang', Config::get('app.lang'));
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function delete($key) {
        unset($_SESSION[$key]);
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }
}
