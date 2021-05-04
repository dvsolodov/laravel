<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if (\Auth::check() && (\Auth::user()->email == $request->email)) {
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
            'name' => 'required|string|alpha_num|min:2|max:24',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:24|confirmed',
        ];
    }
}
