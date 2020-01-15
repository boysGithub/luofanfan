<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Article::find(1);
        return view('article', [
            'article' => $article
        ]);
    }
}
