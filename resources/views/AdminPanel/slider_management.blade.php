@extends('Layouts.admin')
@section('content')

<div class="page-content">
    @include('Layouts.messages')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادارة الصور</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ادارة الصور</h6>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">اضافة صورة</button>

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
                                عنوان الصورة
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 385.859px;">
                                الصورة
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 251.281px;">
                                الاجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider )
                            <tr role="row{{ $slider['id'] }}" class="odd">
                                <td class="sorting_1">{{ $slider['title'] }}</td>
                                <td>
                                    <img src="{{URL::asset('storage/'.$slider['image_path']) }}" alt="" style="width: 80px; border-radius: 50%;">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الاجراءات</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModaledit{{ $slider['id'] }}" data-whatever="@mdo">تعديل</button>
                                            <form action="{{ route('slider.destroy', $slider['id'] ) }}" method="post">
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
                            <h5 class="modal-title" id="exampleModalLabel">اضافة صورة جديدة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">عنوان الصورة:</label>
                                <input type="text" name="title" class="form-control" id="recipient-name" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">العنوان الفرعي:</label>
                                <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title') }}" id="recipient-name">
                                </div>
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">المحتوي الكتابي:</label>
                                <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                <label for="message-text" class="col-form-label">الصورة:</label>
                                <input type="file" class="form-control" id="recipient-name" name="image_path">
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
                </div>
           {{-- Finish Modal adding new image --}}

           @foreach ($sliders as $slider)
                {{-- Start Modal Editing the image --}}
                          <div class="modal fade" id="exampleModaledit{{ $slider['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل صورة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('slider.update',$slider['id']) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">عنوان الصورة:</label>
                                    <input type="text" name="title" class="form-control" id="recipient-name" value="{{ $slider['title'] }}">
                                    </div>
                                    <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">العنوان الفرعي:</label>
                                    <input type="text" name="sub_title" class="form-control" value="{{ $slider['sub_title'] }}" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">المحتوي الكتابي:</label>
                                    <input type="text" name="description" value="{{ $slider['description'] }}" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                    <label for="message-text" class="col-form-label">الصورة:</label>
                                    <input type="file" class="form-control" id="recipient-name" name="image_path">
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
        {{ $sliders->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection