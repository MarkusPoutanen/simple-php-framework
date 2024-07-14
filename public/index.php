<?php

include __DIR__ . '/../autoload.php';
include __DIR__ . '/../routes/web.php';

use App\Route;

if(file_exists(__DIR__ . '/../.env') === false)
{
    echo '<b>.ENV file is missing.</b><br>Copy .env.example and add settings.';
    exit;
}

$path = isset($_GET['path']) ? $_GET['path'] : '/';

// Match static paths
if(in_array($path, array_keys(Route::$routes)))
{
    echo call_user_func(Route::$routes[$path]);

    exit;
}

// Match dynamic paths
foreach(Route::$dynamicRoutes as $pattern => $callable)
{
    preg_match($pattern, $path, $matches);

    if(count($matches) < 1)
    {
        continue;
    }

    echo call_user_func_array($callable, ['id' => $matches[1]]);

    exit;
}

http_response_code(404);
