<?php

namespace App\Presenters;

trait CommentPresenter
{
    public function getRatingAttribute($value)
    {
        $str = '';

        for ($i = 1; $i <= 5; $i++) {
            $rating = 'positive-rating';
            if ($value == 1 && $i > 1)
                $rating = 'negative-rating';
            elseif ($value == 2 && $i > 2)
                $rating = 'negative-rating';
            elseif ($value == 3 && $i > 3)
                $rating = 'negative-rating';
            elseif ($value == 4 && $i > 4)
                $rating = 'negative-rating';

            $str .= '<i class="fas fa-star ' . $rating . '"></i>';
        }

        return $str;
    }
}
