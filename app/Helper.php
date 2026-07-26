<?php

namespace App;

class Helper
{
    /**
     * @param string $name
     * @param array<string, mixed> $variables
     */
    public static function view(string $name, ?array $variables = []): null
    {
        $full_path = __DIR__ . '/../resources/views/' . strtr($name, ['.' => '/']);

        if($variables !== null)
        {
            extract($variables);
        }

        $possible_file_paths = [
            "{$full_path}.php",
            "{$full_path}.html",
        ];

        foreach($possible_file_paths as $file_path)
        {
            if(file_exists($file_path))
            {
                include $file_path;

                return null;
            }
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

        return file_exists($file_path) ? "/{$asset_path}?ver=" . hash_file('xxh3', $file_path) : '';
    }
}
