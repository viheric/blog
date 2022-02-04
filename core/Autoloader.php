<?php

/*
namespace Core;

class Autoloader
{

    /**
     * Register the autoloader 
     *
    static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Include the file corresponding to the class
     * @param $class string Le nom de la classe à charger
     *
    static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}*/
