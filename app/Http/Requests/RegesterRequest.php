<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegesterRequest extends FormRequest
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
            'name' => 'required|min:2|max:50',

            'age' => 'required|numeric',

            'email' => 'required|email|unique:coaches,coach_email|unique:trainees,trainee_email',

            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'الايميل مطلوب',
            'email.email'=>'الايميل غير صحيح',
            'password.required'=>'الرقم السرى مطلوب',

        ];
    }
}
