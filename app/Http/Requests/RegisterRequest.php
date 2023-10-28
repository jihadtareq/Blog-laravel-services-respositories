<?php

namespace App\Http\Requests;

use App\Rules\BirthdayRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'userName'=>['required'],
            'phone'=>['required'],
            'countryId'=>['required','numeric'],
            'gender'=>['required','in:female,male'],
            'bio'=>['nullable','max:350'],
            'picture'=>['nullable','image'],
            'password'=>['required','confirmed', Password::min(8)],
            'email'=>['required','email'],
            'birthday'=>['required',new BirthdayRule()],
        ];
    }
}
