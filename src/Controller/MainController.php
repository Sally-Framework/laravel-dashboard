<?php

namespace Sally\Dashboard\Controller;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('dashboard::main');
    }
}
