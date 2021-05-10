<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RssSourceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::check() && \Auth::user()->is_admin == 1) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url' => 'required|unique:sources|url',
            'category_id' => 'required|integer|min:0|',
        ];
    }
}
