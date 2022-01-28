<?php

namespace App;

class Helper
{
    public static function view($name)
    {
        $full_path = __DIR__ . '/../resources/views/' . strtr($name, ['.' => '/']) . '.php';

        if(file_exists($full_path) === false)
        {
            throw new \Exception('No view file named "' . $name . '" in views folder');
        }
    
        include $full_path;
    }
}
