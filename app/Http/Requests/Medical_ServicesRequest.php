<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Medical_ServicesRequest extends FormRequest
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
        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            return [
                'title' => 'required',
                'description' => 'required',
                'video_path' => 'sometimes|nullable|file|max:80240', // Adjust the allowed formats and maximum file size (e.g., 10 MB)
            ];
        } else {
            return [
                'title' => 'required',
                'description' => 'required',
                'video_path' => 'required|file|max:80240', // Adjust the allowed formats and maximum file size (e.g., 10 MB)
            ];
        }
    }
    public function messages()
    {
        return [
            'title.required' => 'عنوان الصورة مطلوب',
            'description.required' => 'المحتوي الكتابي الخاص بالصورة مطلوب',
            'video_path.video' => 'يجب ان يكون الملف ملف فيديو',
            'video_path.max' => 'يجب ان يكون حجم الملف اقل من 8048 كيلوبايت',
            'video_path.required' => 'الفيديو مطلوبة ',
        ];
    }
}
