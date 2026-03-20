<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function getAllArticles()
    {
        return Article::where('id', '>', 0)->orderBy('id', 'desc')->get();
    }

    public function loadArticlesForApi()
    {
        echo Article::all();
    }

    public function saveNewArt(ArticleRequest $request)
    {
        $article = new Article;
        $article->name = $request->validated('name');
        $article->title = $request->validated('title');
        $article->description = $request->validated('description');
        $article->content = $request->validated('content');
        $article->save();
        echo 'success';
    }

    public function deleteArt($id)
    {
        Article::where('id', '=', $id)->delete();
        echo 'success';
    }

    public function loadSingleArt($id)
    {
        echo Article::where('id', '=', $id)->get();
    }

    public function updateArticle(ArticleRequest $request)
    {
        $article = Article::find($request->validated('id'));
        $article->name = $request->validated('name');
        $article->title = $request->validated('title');
        $article->description = $request->validated('description');
        $article->content = $request->validated('content');
        $article->save();
        echo 'success';
    }
}
