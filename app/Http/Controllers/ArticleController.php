<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class ArticleController extends Controller
{
    public function deleteArticle(Article $article) {  
        $article->delete();

        return response()->json(null, 204);
    }

    public function update(Request $request, Article $article){
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function createArticle(Request $request){
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }
    
    public function show(Article $article){
        return $article;
    }
    
    public function listArticles(){
        return Article::all();
    }
}
