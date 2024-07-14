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

    /**
     * Returns full public path for an asset path.
     * @param string $asset_path Relative asset path in public directory.
     * @return string Full public asset path.
     */
    public static function asset(string $asset_path): string
    {
        $file_path = __DIR__ . '/../public/' . $asset_path;

        if(file_exists($file_path) === false)
        {
            return '';
        }

        return "/{$asset_path}?ver=" . md5_file($file_path);
    }
}
