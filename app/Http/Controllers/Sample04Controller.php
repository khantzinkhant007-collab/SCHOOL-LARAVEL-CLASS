<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Sample04Request;

class Sample04Controller extends Controller
{
    //
    public function index()
    {
        return view('sample04_1');
    }
    public function post(Sample04Request $request){
        $request->session()->regenerateToken();


        // $request->validate(
        //     [
        //         'name'  =>['required'],
        //         'email' =>['required','email'],
        //     ]
        // );

        $result['name'] = $request->input('name');
        $result['email'] = $request->input('email');
        $result['note'] = $request->input('note');

        return view('sample04_2', compact('result'));


    }
}

