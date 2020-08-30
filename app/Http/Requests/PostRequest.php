<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            "title"        => "required|string|max:255",
            "content"      => "required|string",
            "tags"         => "required|array",
            "categories"   => "required|array",
            "photo"        => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }
}
