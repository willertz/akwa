<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticles() {
        return Article::where('id','>',0)->orderBy('id','desc')->get();
    }

    public function loadArticlesForApi() {
       echo Article::all();
    }

    public function saveNewArt(Request $request) {
        $article = new Article();
        $article->name = $request->name;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->save();
        echo "success";
    }

    public function deleteArt($id) {
        Article::where('id','=',$id)->delete();
        echo "success";
    }

    public function loadSingleArt($id) {
        echo Article::where('id','=',$id)->get();
    }

    public function updateArticle(Request $request) {
        $article = Article::find($request->id);
        $article->name = $request->name;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->content = $request->content;
        $article->save();
        echo "success";
    }
}
