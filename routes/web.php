<?php

use App\Route;

use Controllers\PageController;

// Routes

Route::get('/', [PageController::class, 'frontpage']);

Route::get('hello', [PageController::class, 'world']);

Route::get('articles', [PageController::class, 'articles']);
Route::get('articles/{id}', [PageController::class, 'show_article']);
