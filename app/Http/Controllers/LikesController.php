<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Article};

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.api');
    }


    public function like(Article $article)
    {
        if ($article->isLiked()) {
            return response()->json(['message' => 'już kliknales like']);
        }
        $article->increment('likes_count');
        $article->likes()->attach(\Auth::user()->id);
        // attach($model, ['vote' => $vote])
        return response()->json(['likes_count' => $article->likes_count]);
    }

    public function unlike(Article $article)
    {
        $article->decrement('likes_count');
        $article->likes()->detach(\Auth::user()->id);
        return response()->json(['likes_count' => $article->likes_count]);
    }
}
