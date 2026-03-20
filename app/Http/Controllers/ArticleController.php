<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\UseCases\Article\SaveArticleAction;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function __construct(
        private readonly SaveArticleAction $saveArticleAction
    ) {}

    public function getAllArticles()
    {
        return Article::where('id', '>', 0)->orderBy('id', 'desc')->get();
    }

    public function loadArticlesForApi(): JsonResponse
    {
        return response()->json(Article::all());
    }

    public function saveNewArt(ArticleRequest $articleRequest): JsonResponse
    {
        $this->saveArticleAction->execute($articleRequest->validated());

        return response()->json(['status' => 'success']);
    }

    public function deleteArt($id): JsonResponse
    {
        Article::where('id', '=', $id)->delete();

        return response()->json(['status' => 'success']);
    }

    public function loadSingleArt($id): JsonResponse
    {
        return response()->json(Article::where('id', '=', $id)->get());
    }

    public function updateArticle(ArticleRequest $articleRequest): JsonResponse
    {
        $this->saveArticleAction->execute($articleRequest->validated());

        return response()->json(['status' => 'success']);
    }
}
