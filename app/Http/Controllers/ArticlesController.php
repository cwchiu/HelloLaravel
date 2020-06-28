<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function deleteArticle($id)
    {
        Article::find($id)->delete();

        return 204;
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    public function createArticle(Request $request)
    {
        return Article::create($request->all());
    }

    public function getArticleById($id)
    {
        return Article::find($id);
    }

    public function listArticles()
    {
        return Article::all();
    }
}
