<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02Controller extends Controller
{
    public function index(){
        return view('kadai02_1', [
            'message' => 'viewにあるページが表示される'
        ]);
    }

    // public function kadai2_1(){
    //     return view('kadai02_2', [
    //         'message' => 'コントローラーからビューへデータを送る'
    //     ]);
    // }
}
