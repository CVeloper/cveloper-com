<?php

class Config
{

    private static $configuration = array();

    public static function get($key) {
        if(self::$configuration[$key]) {
            return self::$configuration[$key];
        } else {
            return null;
        }
    }

    public static function set($key, $value) {
        self::$configuration[$key] = $value;
    }

}

?>
