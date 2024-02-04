<?php
namespace core;

class Config {
    protected static $settings = [];

    public static function get($key, $default = null) {
        if (empty(self::$settings)) {
            self::loadConfigurationFiles();
        }

        // Support for nested keys using dot notation
        $segments = explode('.', $key);
        $value = self::$settings;

        foreach ($segments as $segment) {
            if (isset($value[$segment])) {
                $value = $value[$segment];
            } else {
                return $default;
            }
        }

        return $value;
    }

    public static function getAll($section = null) {
        if (empty(self::$settings)) {
            self::loadConfigurationFiles();
        }

        if ($section === null) {
            return self::$settings;
        }

        return self::$settings[$section] ?? null;
    }

    protected static function loadConfigurationFiles() {
        $configFiles = glob(__DIR__ . '/../config/*.php');
        
        foreach ($configFiles as $file) {
            $config = include $file;
            $key = basename($file, '.php');
            self::$settings[$key] = $config;
        }
    }
}
