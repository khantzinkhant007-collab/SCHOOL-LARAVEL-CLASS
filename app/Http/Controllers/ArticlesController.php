<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = Article::orderBy("id", "desc")->paginate(25);

        return view("articleList", compact("article"));
    }

    public function create()
    {
        return view("articleRegistration");
    }

    public function store(Request $request)
    {
        $request->session()->regenerateToken();

        $articleDao = new Article();
        $request->validate($articleDao::$rules, $articleDao::$messages);

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;

        if ($request->hasFile("image")) {
            $image = Storage::disk("public")->put("kadai_images", $request->file("image"));
            $article->img_path = basename($image);
        }

        DB::transaction(function () use ($article) {
            $article->save();
        });

        return redirect()->route("articles.index");
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return view("articleDetail", compact("article"));
    }

    public function edit(string $id)
    {
        $article_data = Article::findOrFail($id);

        return view("articleEditing", compact("article_data"));
    }

    public function update(Request $request, string $id)
    {
        $articleDao = new Article();
        $request->validate($articleDao::$rules, $articleDao::$messages);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->body = $request->body;

        if (!$article->img_path && $request->hasFile("image")) {
            $image = Storage::disk("public")->put("kadai_images", $request->file("image"));
            $article->img_path = basename($image);
        }

        DB::transaction(function () use ($article) {
            $article->save();
        });

        return redirect()->route("articles.show", $article->id);
    }

    public function destroy(string $id)
    {
        DB::transaction(function () use ($id) {
            Article::findOrFail($id)->delete();
        });

        return redirect()->route("articles.index");
    }
}
