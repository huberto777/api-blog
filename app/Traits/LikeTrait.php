<?php

namespace App\Traits;

trait LikeTrait
{
    public function isLiked()
    {
        return $this->likes()->where('user_id', \Auth::user()->id)->exists();
    }
}
