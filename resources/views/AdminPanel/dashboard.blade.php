@extends('Layouts.admin')
@section('content')

	<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">اهلا بك فى لوحة التحكم</h4>
          </div>

        </div>
		<div class="row">
            <div class="card col-lg-3 mx-2 mt-2" style="border-right: 5px solid rgb(66,133,244)">
                <div class="card-body pb-0 px-0 ">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5 class="mb-3 col-12 px-0 pl-4 text-uppercase">التخصصات والجراحات</h5>
                    </div>
                    <div class="d-flex flex-column justify-content-start">
                        <h3 class=" mb-2 pl-4  font-weight-bold">{{ $specialties_surgery }}</h3>

                    </div>
                </div>
            </div>
            <div class="card col-lg-3 mx-2 mt-2" style="border-right: 5px solid rgb(196, 40, 40)">
                <div class="card-body pb-0 px-0 ">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5 class="mb-3 col-12 px-0 pl-4 text-uppercase">الخدمات الطبية</h5>
                    </div>
                    <div class="d-flex flex-column justify-content-start">
                        <h3 class=" mb-2 pl-4  font-weight-bold">{{ $medical_services }}</h3>

                    </div>
                </div>
            </div>   
            <div class="card col-lg-3 mx-2 mt-2" style="border-right: 5px solid rgb(221, 179, 43)">
                <div class="card-body pb-0 px-0 ">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h5 class="mb-3 col-12 px-0 pl-4 text-uppercase">اراء العملاء</h5>
                    </div>
                    <div class="d-flex flex-column justify-content-start">
                        <h3 class=" mb-2 pl-4  font-weight-bold">{{ $Feedback }}</h3>
                    </div>
                </div>
            </div>  
            
        </div>
	</div>

@endsection