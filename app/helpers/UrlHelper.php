<?php
namespace app\helpers;

use core\Config;

class UrlHelper {
    public static function redirect($path = '') {
        header("Location: $path");
        exit();
    }

    public static function to($path = '') {
        $path = !$path ?  Config::get('app.base_url') : $path;
        header("Location: $path");
        exit();
    }

    public static function handleNotFound() {
        header("HTTP/1.1 404 Not Found");
        $config = Config::getAll(); // Fetch all configuration data
        if (file_exists(__DIR__ . '/../views/404.php')) {
            require_once __DIR__ . '/../views/404.php';
        } else {
            echo "<h1>404 Not Found</h1><p>The page you are looking for could not be found.</p>";
        }
        exit();
    }
}
