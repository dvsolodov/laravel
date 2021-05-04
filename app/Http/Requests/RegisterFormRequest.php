<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'name' => 'required|string|alpha_num|min:2|max:24',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|string|min:8|max:24|confirmed',
            'remember_me' => 'required|boolean',
        ];
    }
}
