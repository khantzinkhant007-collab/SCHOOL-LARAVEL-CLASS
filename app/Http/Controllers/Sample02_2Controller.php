<?php

namespace App\Http\Controllers;

class Sample02_2Controller extends Controller
{
    public function index()
    {
        $num = 1;

        return view('sample02_2', compact('num'));
    }
}
