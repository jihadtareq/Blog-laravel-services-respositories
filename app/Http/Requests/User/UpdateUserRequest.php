<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstName'=>['required'],
            'lastName'=>['required'],
            // 'phone'=>['required','unique:users,phone'],
            // 'email'=>['email','unique:users,email'],
            'birthday'=>['required'],
            'gender'=>['required'],
            'bio'=>['required','max:200'],
            'picture'=>['nullable','mimes:jpg,png,bmp'],
        ];
    }
}
