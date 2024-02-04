<?php
namespace app\helpers;

use core\Config;

class DebugHelper {
    public static function dd(...$vars) {
        if (true === Config::get('app.debug')) {
            foreach ($vars as $var) {
                echo '<pre>';
                var_dump($var);
                echo '</pre>';
            }
            exit;
        }
    }

    public static function dump(...$vars) {
        if (true === Config::get('app.debug')) {
            foreach ($vars as $var) {
                echo '<pre>';
                var_dump($var);
                echo '</pre>';
            }   
        }
    }

    public static function prettyJson($data, $exit = false) {
        if (true === Config::get('app.debug')) {
            header('Content-Type: application/json');
            echo json_encode($data, JSON_PRETTY_PRINT);
            if ($exit) {
                exit;
            }
        }
    }
}
