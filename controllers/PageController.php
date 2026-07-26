<?php

namespace Controllers;

use App\Helper;
use Models\Article;

class PageController
{
    public function frontpage(): null
    {
        return Helper::view('frontpage');
    }

    public function world(): null
    {
        return Helper::view('hello.world');
    }

    public function articles(): null
    {
        return Helper::view('articles', [
            'articles' => Article::all()
        ]);
    }

    public function show_article(int $id): null
    {
        return Helper::view('article', [
            'article' => Article::findOrFail($id)
        ]);
    }
}