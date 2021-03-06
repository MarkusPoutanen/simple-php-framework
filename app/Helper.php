<?php

namespace App;

class Helper
{
    public static function view($name, $variables = null)
    {
        $full_path = __DIR__ . '/../resources/views/' . strtr($name, ['.' => '/']);

        if($variables !== null)
        {
            extract($variables);
        }

        if(file_exists($full_path . '.php'))
        {
            include $full_path . '.php';
            return;
        }
        
        if(file_exists($full_path . '.html'))
        {
            include $full_path . '.html';
            return;
        }
        
        throw new \Exception('No view named "' . $name . '" in views folder');
    }
}
