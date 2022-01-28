<?php

include __DIR__ . '/../autoload.php';
include __DIR__ . '/../routes/web.php';

use App\Route;

$path = isset($_GET['path']) ? $_GET['path'] : '/';

if(in_array($path, array_keys(Route::$routes)))
{
    call_user_func(Route::$routes[$path]);

    exit;
}

http_response_code(404);
