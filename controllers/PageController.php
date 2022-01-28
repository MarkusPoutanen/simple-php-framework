<?php

namespace Controllers;

use App\Helper;

class PageController
{
    public function frontpage()
    {
        return Helper::view('frontpage');
    }
}