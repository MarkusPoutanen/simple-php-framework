<?php

namespace Controllers;

use App\Helper;
use Models\Article;

class PageController
{
    public function frontpage()
    {
        return Helper::view('frontpage');
    }

    public function world()
    {
        return Helper::view('hello.world');
    }

    public function articles()
    {
        return Helper::view('articles', [
            'articles' => Article::all()
        ]);
    }

    public function show_article($id)
    {
        return Helper::view('article', [
            'article' => Article::find($id)
        ]);
    }
}