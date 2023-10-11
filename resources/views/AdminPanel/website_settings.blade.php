@extends('Layouts.admin')
@section('content')

<div class="page-content">
    @include('Layouts.messages')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادارة اعدادات الموقع</li>
        </ol>
    </nav>
    @foreach ($settings as $setting)
        <form action="{{ route('website_settings.update',1) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">عننا</h6>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">عننا الجزء الاول</label>
                                    <textarea class="form-control" name="about_us_part1" id="exampleFormControlTextarea1" rows="5">{{ $setting->about_us_part1 }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">عننا الجزء الثاني</label>
                                    <textarea class="form-control" name="about_us_part2" id="exampleFormControlTextarea1" rows="5">{{ $setting->about_us_part2 }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">الصورة</label>
                                    <input type="file" name="image_path" class="form-control" id="exampleInputText1">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">الاحصائيات</h6>
                                <div class="form-group">
                                    <label for="exampleInputText1">ارقام المرضي</label>
                                    <input type="text" name="patient_number" class="form-control" id="exampleInputText1" value="{{ $setting->patient_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">ارقام الجراحات</label>
                                    <input type="text" name="surgeries_number" class="form-control" id="exampleInputText1" value="{{ $setting->surgeries_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">ارقام الزوار</label>
                                    <input type="text" name="visitors_number" class="form-control" id="exampleInputText1" value="{{ $setting->visitors_number }}">
                                </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">تواصل معنا</h6>
                                <div class="form-group">
                                    <label for="exampleInputText1">العنوان</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputText1" value="{{ $setting->address }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رابط العنوان</label>
                                    <input type="text" name="map_url" class="form-control" id="exampleInputText1" value="{{ $setting->map_url }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">صورة الخريطة</label>
                                    <input type="file" name="image_path_map" class="form-control" id="exampleInputText1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رقم الهاتف الارضي</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputText1" value="{{ $setting->phone }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رقم الهاتف المحمول</label>
                                    <input type="text" name="mobile" class="form-control" id="exampleInputText1" value="{{ $setting->mobile }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">البريد الالكتروني</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputText1" value="{{ $setting->email }}" placeholder="Enter Name">
                                </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">اعدادات الموقع</h6>
                                <div class="form-group">
                                    <label for="exampleInputText1">الشعار</label>
                                    <input type="text" name="slogan" class="form-control" id="exampleInputText1" value="{{ $setting->slogan }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">المحتوي الكتابي للموقع</label>
                                    <textarea class="form-control" name="content_footer" id="exampleFormControlTextarea1" rows="5">{{ $setting->content_footer }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">شروط الاستخدام</label>
                                    <textarea class="form-control" name="terms_of_use" id="exampleFormControlTextarea1" rows="5">{{ $setting->terms_of_use  }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">سياسة الخصوصية</label>
                                    <textarea class="form-control" name="privacy_policy" id="exampleFormControlTextarea1" rows="5">{{ $setting->privacy_policy }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رقم الـ WhatsApp</label>
                                    <input type="text" name="whatsapp" class="form-control" id="exampleInputText1" value="{{ $setting->whatsapp }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رابط Facebook</label>
                                    <input type="text" name="facebook" class="form-control" id="exampleInputText1" value="{{ $setting->facebook }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رابط Instagram</label>
                                    <input type="text" name="instagram" class="form-control" id="exampleInputText1" value="{{ $setting->instagram }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رابط Linked-In</label>
                                    <input type="text" name="linkedin" class="form-control" id="exampleInputText1" value="{{ $setting->linkedin }}" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputText1">رابط Tiktok</label>
                                    <input type="text" name="tiktok" class="form-control" id="exampleInputText1" value="{{ $setting->tiktok }}" placeholder="Enter Name">
                                </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-primary" type="submit">تعديل البيانات</button>
                        </div>
                    </div>
                </div>
            </div> 
        </form>
    @endforeach 
</div>

@endsection