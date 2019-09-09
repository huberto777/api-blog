<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use \App\Presenters\CommentPresenter;

    protected $fillable = ['article_id', 'user_id', 'content', 'rating'];
    protected $with = ['article'];
    protected $appends = ['rating'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($comment) {
            $comment->article->increment('comments_count');
        });

        static::deleted(function ($comment) {
            $comment->article->decrement('comments_count');
        });
    }
}
