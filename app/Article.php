<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Traits\LikeTrait;

    protected $fillable = ['title', 'slug', 'content', 'user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'articles_tags');
    }
}
