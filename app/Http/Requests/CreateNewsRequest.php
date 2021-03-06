<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'title' => 'required|string|min:10|max:50',
            'description' => 'required|string|min:10|max:100',
            'text' => 'required|string|min:100|max:2500',
            'category_id' => 'required|integer|numeric|min:1',
            'source_id' => 'required|integer|numeric|min:1',
        ];
    }
}
