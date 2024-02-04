<?php
namespace app\helpers;

class UrlHelper {
    public static function redirect($path) {
        header("Location: $path");
        exit();
    }

    public static function to($route) {
        echo "/$route";
    }
}
