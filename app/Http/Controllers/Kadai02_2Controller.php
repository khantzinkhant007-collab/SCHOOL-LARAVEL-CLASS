<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_2Controller extends Controller
{
    //
    public function index(){
        return view('kadai02_2', [
            'message' => 'コントローラーからビューへデータを送る'
        ]);
    }


}
