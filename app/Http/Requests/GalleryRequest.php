<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
                'title'=> 'required',
                'image_path'=> 'image|mimes:jpeg,png,jpg,gif|max:8048', // Adjust validation rules for image
            ];
        }else{
            return [
                'title'=> 'required',
                'image_path'=> 'required|image|mimes:jpeg,png,jpg,gif|max:8048', // Adjust validation rules for image
            ];
        }
    }
    public function messages()
    {
        return [
            'title.required' => 'عنوان الصورة مطلوب',
            'image_path.image' => 'يجب ان يكون الملف ملف صورة',
            'image_path.mimes' => 'يجب ان يكون الملف من نوع jpeg,png,jpg,gif',
            'image_path.max' => 'يجب ان يكون حجم الملف اقل من 8048 كيلوبايت',
            'image_path.required' => 'الصورة مطلوبة ',
        ];
    }
}
