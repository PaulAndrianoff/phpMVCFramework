<?php
namespace app\helpers;

use DateTime;
use app\helpers\SessionHelper;

class FormHelper {
    public static function clean($inputs) {
        $cleanInputs = [];
        foreach ($inputs as $key => $value) {
            $cleanInputs[$key] = self::sanitize($value, $key);
        }

        if ([] !== $_FILES) {
            $cleanInputs['path'] = self::uploadFile();
        }

        return $cleanInputs;
    }

    public static function verify($inputs, $models) {
        $verifiedForm = [];
        foreach ($inputs as $key => $value) {
            if (!self::verifyInput($value, $models[$key])) {
                $verifiedForm[$key] = $key . ' input is not valid';
            }
        }
        return $verifiedForm;
    }

    public static function verifyInput($input, $validation) {
        if (!isset($validation['validator']) || '' === $validation['validator']) {
            return true;
        }
        return preg_match($validation['validator'], $input);
    }

    public static function sanitize($input, $type = 'text') {
        if ('email' === $type) {
            return filter_var($input, FILTER_SANITIZE_EMAIL);
        }
        
        if ('password' === $type) {
            return hash('sha256', $input);
        }
        
        if ('author' === $type) {
            return SessionHelper::get('username');
        }
        
        if ('updated_at' === $type) {
            $dateTime = new DateTime();
            return $dateTime->format('Y-m-d H:i:s');
        }
        
        if ('body' === $type || 'headline' === $type) {
            return $input;
        }

        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    public static function uploadFile() {
        $targetDir =  "uploads/";
        $targetFile = $targetDir . basename($_FILES["path"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // $check = getimagesize($_FILES["path"]["tmp_name"]);
        // if($check === false) {
        //     return '';
        // }

        // // Check if file already exists
        // if (file_exists($targetFile)) {
        //     return '';
        // }

        // // Check file size
        // if ($_FILES["path"]["size"] > 500000) { // 500KB size limit
        //     return '';
        // }

        // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        //     return '';
        // }

        if (move_uploaded_file($_FILES["path"]["tmp_name"], __DIR__ . '/../../' . $targetFile)) {
            return $targetDir . basename($_FILES["path"]["name"]);
        } else {
            return '';
        }
    }
}
