<?php

use App\Route;

use Controllers\PageController;

// Routes

Route::get('/', [PageController::class, 'frontpage']);

Route::get('hello', [PageController::class, 'world']);
