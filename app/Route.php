<?php

namespace App;

class Route
{
    public static $routes = [];

    public static function get($path, $class_and_method)
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET')
        {
            http_response_code(404);
            exit;
        }

        if(is_array($class_and_method) === false|| count($class_and_method) < 2)
        {
            throw new \Exception('Class and Method argument invalid!');
        }

        Route::register($path, $class_and_method[0], $class_and_method[1]);
    }

    private static function register($path, $class, $function)
    {
        $obj_instance = new $class;
        
        $callable = [$obj_instance, $function];
        
        if(is_callable($callable) === false)
        {
            throw new \Exception('Callable name is invalid!');
        }

        Route::$routes[$path] = $callable;
    }
}