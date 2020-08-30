<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "nickname"      => "required|string|min:3|max:255",
            "description"   => "required|string|max:255",
            "about"         => "required|string",
            "avatar"        => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "facebook"      => "required|string",
            "twitter"       => "required|string",
            "instagram"     => "required|string",
            "youtube"       => "required|string",
        ];
    }
}
