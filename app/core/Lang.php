<?php

namespace App\Core;

class Lang
{
    private static $currentLang = 'ru';
    private static $translations = [];

    public static function load($lang)
    {
        $file = __DIR__ . '/../lang/' . $lang . '.php';
        if (file_exists($file)) {
            self::$translations = require $file;
            self::$currentLang = $lang;
            $_SESSION['lang'] = $lang;
        } else {
            
            if ($lang !== 'ru') {
                self::load('ru');
            }
        }
    }

    public static function get($key)
    {
        return isset(self::$translations[$key]) ? self::$translations[$key] : $key;
    }

    public static function current()
    {
        return self::$currentLang;
    }
}
