<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth('admin')->guest()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required',
            'email'=> 'required | email',
            'message'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'يجب ادخال الاسم',
            'email.required' => 'يجب ادخال البريد الالكتروني',
            'email.email' => 'يجب ادخال البريد الالكتروني بشكل صحيح',
            'message.required' => 'يجب ادخال الرسالة',
        ];
    }
}
