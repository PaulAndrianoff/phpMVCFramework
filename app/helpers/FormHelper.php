<?php
namespace app\helpers;

class FormHelper {
    public static function clean($inputs) {
        $cleanInputs = [];
        foreach ($inputs as $key => $value) {
            $cleanInputs[$key] = self::sanitize($value, $key);
        }

        return $cleanInputs;
    }

    public static function sanitize($input, $type = 'text') {
        if ('email' === $type) {
            return filter_var($input, FILTER_SANITIZE_EMAIL);
        }
        
        if ('password' === $type) {
            return hash('sha256', $input);
        }

        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}
