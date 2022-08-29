<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Spatie\FlareClient\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Gate;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if (Gate::denies('show', $order)) {
        //     abort(403, 'Unauthorized Page Request');
        // }
        // abort_if(Gate::denies("exists:table,column"), Response::HTTP_FORBIDDEN);
        abort_if(Gate::denies("delete"), Response::HTTP_FORBIDDEN);
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
            "title" => [
                "required"
            ],
            "slug" => [
                "required",
                "alpha_dash",
                "unique:news"
            ],
            "description" => "required|min:10",
            "keywords" => "required",
            "content" => "required"
        ];
    }
}
