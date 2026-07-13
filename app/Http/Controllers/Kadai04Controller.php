<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kadai04Request;
use Illuminate\Http\Request;

class Kadai04Controller extends Controller
{
    //
    public function index()
    {
        return view('kadai04_1');
    }

    public function post(Kadai04Request $request)
    {
        $input = $request->only([
            'type',
            'name',
            'email',
            'subject',
            'content',
        ]);

        $request->session()->put('kadai04.input', $input);

        return redirect()->route('kadai04.confirm');
    }

    public function confirm(Request $request)
    {
        $input = $request->session()->get('kadai04.input');

        if (!$input) {
            return redirect()->route('kadai04.index');
        }

        return view('kadai04_2', compact('input'));
    }

    public function back(Request $request)
    {
        $input = $request->session()->get('kadai04.input', []);

        return redirect()
            ->route('kadai04.index')
            ->withInput($input);
    }

    public function complete(Request $request)
    {
        $data = $request->session()->pull('kadai04.input');

        if (!$data) {
            return redirect()->route('kadai04.index');
        }

        // DB登録やメール送信を行う場合は、ここで$dataを利用できます。

        return view('kadai04_3', compact('data'));
    }
}
