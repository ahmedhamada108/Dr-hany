@extends('Layouts.admin')
@section('content')

<div class="page-content">
    @include('Layouts.messages')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
            <li class="breadcrumb-item active" aria-current="page">ادارة المسؤولين</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ادارة المسؤولين</h6>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">اضافة مسؤول</button>

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
                                اسم المسؤول
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 385.859px;">
                                البريد الالكتروني
                            </th>
                            <th class="sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 251.281px;">
                                الاجراءات
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin )
                            <tr role="row{{ $admin['id'] }}" class="odd">
                                <td class="sorting_1">{{ $admin['name'] }}</td>
                                <td class="sorting_1">{{ $admin['email'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الاجراءات</button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModaledit{{ $admin['id'] }}" data-whatever="@mdo">تعديل</button>
                                            <form action="{{ route('admins.destroy', $admin['id'] ) }}" method="post">
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
                            <h5 class="modal-title" id="exampleModalLabel">اضافة مسؤول جديدة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('admins.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">اسم المسؤول:</label>
                                <input type="text" name="name" class="form-control" id="recipient-name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">البريد الالكتروني:</label>
                                    <input type="email" name="email" class="form-control" id="recipient-name" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">كلمة المرور:</label>
                                    <input type="password" name="password" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">تاكيد كلمة المرور:</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="recipient-name">
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

           @foreach ($admins as $admin)
                {{-- Start Modal Editing the image --}}
                          <div class="modal fade" id="exampleModaledit{{ $admin['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل المسؤول</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('admins.update',$admin['id']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">اسم المسؤول:</label>
                                        <input type="text" name="name" class="form-control" id="recipient-name" value="{{ $admin['name'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">البريد الالكتروني:</label>
                                            <input type="email" name="email" class="form-control" id="recipient-name" value="{{ $admin['email'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">كلمة المرور:</label>
                                            <input type="password" name="password" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">تاكيد كلمة المرور:</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="recipient-name">
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
        {{ $admins->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection