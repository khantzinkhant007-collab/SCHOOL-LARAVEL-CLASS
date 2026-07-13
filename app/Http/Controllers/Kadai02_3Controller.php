<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Kadai02_3Controller extends Controller
{
    public function index(){





        $comment = "コントローラからビューへ渡された値。";

        return view('kadai02_3', compact('comment'));
    }
}
