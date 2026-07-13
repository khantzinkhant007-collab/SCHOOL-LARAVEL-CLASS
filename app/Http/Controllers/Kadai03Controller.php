<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class Kadai03Controller extends Controller
{
    //
    public function index(){
        $article = Article::withTrashed()->orderBy('id')->paginate(25);
        return view("articleList", compact("article"));
    }
    public function create(){
        return view("articleRegistration");
    }

    public function show(){
        return redirect()->route('articles.index');
    }

    public function edit(){
        return redirect()->route('articles.index');
    }
}
