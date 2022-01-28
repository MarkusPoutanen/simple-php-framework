<?php

use App\Route;

use Controllers\InfoController;
use Controllers\PageController;

// Routes

Route::get('info', [InfoController::class, 'info']);

Route::get('/', [PageController::class, 'frontpage']);

Route::get('hello', [PageController::class, 'world']);
