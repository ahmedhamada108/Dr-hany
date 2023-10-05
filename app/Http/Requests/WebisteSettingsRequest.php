<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebisteSettingsRequest extends FormRequest
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
        return [
            'slogan'=> 'required',
            'about_us_part1'=> 'required',
            'about_us_part2'=> 'required',
            'patient_number'=> 'required',
            'surgeries_number'=> 'required',
            'visitors_number'=> 'required',
            'address'=> 'required',
            'map_url'=> 'required',
            'image_path_map'=> 'image|mimes:jpeg,png,jpg,gif|max:8048', // Adjust validation rules for image
            'phone'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required | email',
            'content_footer'=> 'required',
            'terms_of_use'=> 'required',
            'privacy_policy'=> 'required',
            'whatsapp'=> 'required',
            'facebook'=> 'required',
            'linkedin'=> 'required',
            'instagram'=> 'required',
            'tiktok'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'slogan.required' => 'الشعار مطلوب',
            'about_us_part1.required' => 'المحتوي الكتابي الخاص بمن نحن مطلوب',
            'about_us_part2.required' => 'المحتوي الكتابي الخاص بمن نحن مطلوب',
            'patient_number.required' => 'عدد المرضي مطلوب',
            'surgeries_number.required' => 'عدد العمليات مطلوب',
            'visitors_number.required' => 'عدد الزوار مطلوب',
            'address.required' => 'العنوان مطلوب',
            'map_url.required' => 'رابط الخريطة مطلوب',
            'image_path_map.image' => 'يجب ان يكون الملف ملف صورة',
            'image_path_map.mimes' => 'يجب ان يكون الملف من نوع jpeg,png,jpg,gif',
            'image_path_map.max' => 'يجب ان يكون حجم الملف اقل من 8048 كيلوبايت',
            'image_path_map.required' => 'الصورة مطلوبة ',
            'phone.required' => 'رقم الهاتف مطلوب',
            'mobile.required' => 'رقم الجوال مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'content_footer.required' => 'المحتوي الكتابي الخاص بالفوتر مطلوب',
            'terms_of_use.required' => 'الشروط والاحكام مطلوبة',
            'privacy_policy.required' => 'سياسة الخصوصية مطلوبة',
            'whatsapp.required' => 'رقم الواتساب مطلوب',
            'facebook.required' => 'رابط الفيسبوك مطلوب',
            'linkedin.required' => 'رابط اللينكد ان مطلوب',
            'instagram.required' => 'رابط الانستجرام مطلوب',
            'tiktok.required' => 'رابط التيك توك مطلوب',

        ];
    }
}
