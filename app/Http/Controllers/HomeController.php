<?php

namespace zaiimrq\Http\Controllers;

use zaiimrq\Facade\View;

class HomeController
{
    public function index($variable): void
    {
        View::render('index');
    }
}
