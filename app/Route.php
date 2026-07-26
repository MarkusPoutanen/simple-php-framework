<?php

namespace App;

class Route
{
    /** @var array<string, array{0: object, 1: callable|string}> */
    public static array $routes = [];

    /** @var array<string, array{0: object, 1: callable|string}> */
    public static array $dynamicRoutes = [];

    /**
     * @param string $path
     * @param array{0: class-string, 1: callable|string} $class_and_method
     */
    public static function get(string $path, array $class_and_method): void
    {
        if($_SERVER['REQUEST_METHOD'] !== 'GET')
        {
            http_response_code(405);
            exit;
        }

        if(count($class_and_method) !== 2)
        {
            throw new \Exception('Class or Method invalid!');
        }

        preg_match('/{(.+)}/', $path, $matches);

        if(isset($matches[1]))
        {
            $path_as_regex = strtr($path, ['/' => '\/']);
            $path_as_regex = strtr($path_as_regex, [$matches[0] => '(.+)']);
            $path_as_regex = '/' . $path_as_regex . '/';

            self::$dynamicRoutes[$path_as_regex] = self::getCallable($class_and_method[0], $class_and_method[1]);

            return;
        }

        self::$routes[$path] = self::getCallable($class_and_method[0], $class_and_method[1]);
    }

    /**
     * @param class-string $class
     * @param callable|string $method
     * @return array{0: object, 1: callable|string}
     */
    private static function getCallable(string $class, callable|string $method): array
    {
        $obj_instance = new $class;

        $callable = [$obj_instance, $method];

        if(is_callable($callable) === false)
        {
            throw new \Exception('Callable name is invalid!');
        }

        return $callable;
    }
}