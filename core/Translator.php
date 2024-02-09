<?php
namespace core;

use core\Config;

class Translator {
    private $translations = [];

    public function __construct($lang = 'en') {
        $this->loadLanguageFile($lang);
    }

    private function loadLanguageFile($lang) {
        $file = "./../translations/{$lang}.json";
        if (file_exists($file)) {
            $this->translations = json_decode(file_get_contents($file), true);
        } else {
            echo "Language file not found: {$file}";
            exit;
        }
    }

    public function translate($key) {
        if (isset($this->translations[$key])) {
            return $this->translations[$key];
        }

        return $key;
    }
}
