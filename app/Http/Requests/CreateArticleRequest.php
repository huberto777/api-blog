<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Article;

class CreateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5|unique:articles',
            'content' => 'required|string|min:10',
        ];
    }
}
