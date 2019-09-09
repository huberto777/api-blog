<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Article, Comment};
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.api')->except('index');
    }

    public function index(Article $article)
    {
        return $article->comments()->get();
    }

    public function store(Article $article, CreateCommentRequest $request)
    {
        $comment = $article->comments()->create($request->all() + ['user_id' => \Auth::user()->id]);

        return response()->json(['created' => $comment], 201);
    }

    public function edit(Article $article, Comment $comment)
    {
        return response()->json($comment);
    }

    public function update(UpdateCommentRequest $request, Article $article, Comment $comment)
    {
        $comment->update($request->all());

        return response()->json(['updated' => $comment], 200);
    }

    public function destroy(Article $article, Comment $comment)
    {
        $comment->delete();

        return response()->json(['deleted' => $comment], 200);
    }
}
