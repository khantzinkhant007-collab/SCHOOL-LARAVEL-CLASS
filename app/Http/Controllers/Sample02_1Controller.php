<?php

namespace App\Http\Controllers;

class Sample02_1Controller extends Controller
{
    public function index()
    {
        $data = 'data 1 value';
        $data2 = 'data 2 value';
        $data3 = 'data 3 value';

        return view('sample02_1', compact('data', 'data2', 'data3'));
    }
}
