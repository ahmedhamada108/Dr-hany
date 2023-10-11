@extends('Layouts.admin')
@section('content')

<div class="page-content">
    @include('Layouts.messages')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادارة الخدمات الطبية</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ادارة الخدمات الطبية</h6>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">اضافة خدمة طبية</button>

    <div class="table-responsive">
      <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTableExample_length">
                    <label style="margin: 2%;">
                        اظهار الجدول بعدد
                    </label>
                        <select style="text-align: center;font-weight: bold;margin-right: 2% !important;width: 20% !important;" name="dataTableExample_length" aria-controls="dataTableExample" class="custom-select custom-select-sm form-control">
                            <option value="10">10</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="-1">All</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table style="margin-left: 10px;margin-right: 10px;" id="dataTableExample" class="table dataTable no-footer" role="grid" aria-describedby="dataTableExample_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="1" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 251.281px;">
                                اسم الخدمة الطبية
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 251.281px;">
                                الاجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medical_services as $medical_service )
                            <tr role="row{{ $medical_service['id'] }}" class="odd">
                                <td class="sorting_1">{{ $medical_service['title'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الاجراءات</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModaledit{{ $medical_service['id'] }}" data-whatever="@mdo">تعديل</button>
                                            <form action="{{ route('medical_services.destroy', $medical_service['id'] ) }}" method="post">
                                                @csrf
                                                @method('DELETE')                                            
                                                <button type="submit" class="dropdown-item">حذف</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>

            {{-- Start Modal adding new image --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">اضافة خدمة طبية جديدة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('medical_services.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">اسم الخدمة الطبية:</label>
                                        <input type="text" name="title" class="form-control" id="recipient-name" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">وصف الخدمة الطبية:</label>
                                        <input type="text" name="description" class="form-control" id="recipient-name" value="{{ old('description') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">الصورة:</label>
                                        <input type="file" class="form-control" id="recipient-name" name="video_path">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                    </div>
                                </form>                                
                        </div>
                        </div>
                    </div>
                </div>
           {{-- Finish Modal adding new image --}}

           @foreach ($medical_services as $medical_service)
                {{-- Start Modal Editing the image --}}
                          <div class="modal fade" id="exampleModaledit{{ $medical_service['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل خدمة طبية</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('medical_services.update',$medical_service['id']) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">اسم الخدمة الطبية:</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name" value="{{ $medical_service['title'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">وصف الخدمة الطبية:</label>
                                        <input type="text" name="description" class="form-control" id="recipient-name" value="{{ $medical_service['title'] }}">
                                    </div>
                                    <div class="form-group">
                                    <label for="message-text" class="col-form-label">الفيديو:</label>
                                    <input type="file" class="form-control" id="recipient-name" name="video_path">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                {{-- Finish Modal Editing the image --}}
           @endforeach
        </div>
        {{ $medical_services->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection