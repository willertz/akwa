<?php

declare(strict_types=1);

namespace App\UseCases\Article;

use App\Models\Article;

class SaveArticleAction
{
    public function execute(array $data): Article
    {
        $article = isset($data['id']) ? Article::findOrFail($data['id']) : new Article;

        $article->fill([
            'name' => $data['name'],
            'title' => $data['title'],
            'description' => $data['description'] ?? '',
            'content' => $data['content'] ?? '',
        ]);

        $article->save();

        return $article;
    }
}
