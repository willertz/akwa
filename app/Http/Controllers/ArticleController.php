<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function getAllArticles()
    {
        return Article::where('id', '>', 0)->orderBy('id', 'desc')->get();
    }

    public function loadArticlesForApi(): void
    {
        echo Article::all();
    }

    public function saveNewArt(ArticleRequest $articleRequest): void
    {
        $article = new Article;
        $article->name = $articleRequest->validated('name');
        $article->title = $articleRequest->validated('title');
        $article->description = $articleRequest->validated('description');
        $article->content = $articleRequest->validated('content');
        $article->save();
        echo 'success';
    }

    public function deleteArt($id): void
    {
        Article::where('id', '=', $id)->delete();
        echo 'success';
    }

    public function loadSingleArt($id): void
    {
        echo Article::where('id', '=', $id)->get();
    }

    public function updateArticle(ArticleRequest $articleRequest): void
    {
        $article = Article::find($articleRequest->validated('id'));
        $article->name = $articleRequest->validated('name');
        $article->title = $articleRequest->validated('title');
        $article->description = $articleRequest->validated('description');
        $article->content = $articleRequest->validated('content');
        $article->save();
        echo 'success';
    }
}
