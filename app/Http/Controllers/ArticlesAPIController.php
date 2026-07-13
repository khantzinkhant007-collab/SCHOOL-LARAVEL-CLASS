<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Libs\JsonConvert;
use App\Models\Article;

class ArticlesAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::orderBy("created_at", "desc")->get();
        $convert = new JsonConvert();
        if($articles){
            $articles = ArticleResource::collection($articles);
            $status = Response::HTTP_OK;
        }else{
            $status = Response::HTTP_NOT_FOUND;

        }
        return $convert->toJson($articles,$status);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $article = Article::find($id);
        $convert = new JsonConvert();

        if($article){
             $article = new ArticleResource($article);
            $status = Response::HTTP_OK;
        }else{
            $status = Response::HTTP_NOT_FOUND;
        }
        return $convert->toJson($article,$status);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
