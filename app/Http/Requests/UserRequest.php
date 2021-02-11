<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'image' => 'mimes:jpeg,bmp,png',
            'tel' => 'regex:/^\([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}/ ',
        ];
    }

    public function messages()
    {
        return ['mimes' => 'The picture format should be: jpeg,bmp,png'];
    }
}
