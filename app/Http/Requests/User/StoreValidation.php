<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidation extends FormRequest
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
            'first_name'=>['required'],
            'last_name'=>['required'],
            'user_name'=>['required','unique:users,user_name'],
            'phone'=>['required','unique:users,phone'],
            'email'=>['email','unique:users,email'],
            'password'=>['required','confirmed'],
            'birthday'=>['required','after:1900','before:2015'],
            'gender'=>['required'],
            'bio'=>['required','max_digits:200'],
            'picture'=>['nullable','mimes:jpg,png,bmp'],
        ];
    }
}
