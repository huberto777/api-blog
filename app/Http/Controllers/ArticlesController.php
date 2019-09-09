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
        $articles = Article::with(['user', 'comments'])->orderBy('id', 'desc')->get();

        return response()->json($articles);
    }

    public function show(Article $article)
    {
        $article->increment('views'); //zwiększa licznik odwiedzin
        return response()->json($article);
    }

    public function edit(Article $article)
    {
        return response()->json($article);
    }

    public function store(CreateArticleRequest $request)
    {
        $article = Article::create($request->all() + [
            'slug' => str_slug($request->title),
            'user_id' => \Auth::user()->id
        ]);

        return response()->json(['created' => $article], 201);
    }

    public function update(Article $article, UpdateArticleRequest $request)
    {
        $article->update($request->all() + ['slug' => str_slug($request->title)]);
        return response()->json(['updated' => $article], 200);
    }

    public function destroy(Article $article)
    {
        $article->comments()->delete();
        $article->delete();
        $article->likes()->detach(\Auth::user()->id);

        return response()->json(['deleted' => $article], 200);
    }
}
