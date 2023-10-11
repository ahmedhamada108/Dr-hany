<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        if($this->method() == 'PUT' || $this->method() == 'PATCH'){
            return [
                'name'=> 'required',
                'email'=> ['required',Rule::unique('admins')->ignore($this->user()->id, 'id')],
                'password'=> 'sometimes|nullable|min:8|confirmed',
            ];
        }else{
            return [
                'name'=> 'required',
                'email'=> 'required | email | unique:admins,email',
                'password'=> 'required|min:8|confirmed',
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'يجب ان يكون البريد الالكتروني صحيح',
            'email.unique' => 'البريد الالكتروني مستخدم من قبل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب ان تكون كلمة المرور اكثر من 8 احرف',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
        ];
    }
}
