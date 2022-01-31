<?php

namespace App;

class Route
{
    public static $routes = [];
    public static $dynamicRoutes = [];

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
        
        preg_match('/{(.+)}/', $path, $matches);

        if(isset($matches[1]))
        {
            $path_as_regex = strtr($path, ['/' => '\/']);
            $path_as_regex = strtr($path_as_regex, [$matches[0] => '(.+)']);
            $path_as_regex = '/' . $path_as_regex . '/';

            Route::registerDynamic($path_as_regex, $class_and_method[0], $class_and_method[1]);
        }

        Route::register($path, $class_and_method[0], $class_and_method[1]);
    }

    private static function register($path, $class, $function)
    {
        $callable = Route::getCallable($class, $function);

        Route::$routes[$path] = $callable;
    }

    private static function registerDynamic($pathAsRegex, $class, $function)
    {
        $callable = Route::getCallable($class, $function);

        Route::$dynamicRoutes[$pathAsRegex] = $callable;
    }

    private static function getCallable($class, $function)
    {
        $obj_instance = new $class;
        
        $callable = [$obj_instance, $function];
        
        if(is_callable($callable) === false)
        {
            throw new \Exception('Callable name is invalid!');
        }

        return $callable;
    }
}