<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Article};
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.api')->except(['index', 'show']);
    }

    public function index()
    {
        // $articles = Article::paginate(10);
        $articles = Article::orderBy('id', 'desc')->get();

        return response()->json($articles);
    }

    public function show(Article $article)
    {
        return response()->json($article);
    }

    public function edit(Article $article)
    {
        return response()->json($article);
    }

    public function store(CreateArticleRequest $request)
    {
        $article = Article::create($request->all());

        return response()->json(['created' => $article], 201);
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {
        $article->update($request->all());
        return response()->json(['updated' => $article], 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(['deleted' => $article], 200);
    }
}
