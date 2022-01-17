<?php
/**
 * Created by PhpStorm.
 * User: Aziz Juraev
 * Date: 17.01.2022
 * Time: 15:38
 */

namespace app;


use ErrorException;

class Config
{

    private static array $config = [];

    public static function set(array $config) : void
    {
        self::$config = $config;
    }

    public static function get(string $key)
    {
        if (isset(self::$config[$key]))
        {
            return self::$config[$key];
        }
        throw new ErrorException('Config "' . $key . '" not found' );
    }

}