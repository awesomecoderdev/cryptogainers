<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            "title" => "required|min:5",
            // "slug" => "required|unique:table,column,except,id",
            // "slug" => "required|unique:news,slug",
            "description" => "required|min:10",
            "keywords" => "required",
            "content" => "required"
        ];
    }
}
