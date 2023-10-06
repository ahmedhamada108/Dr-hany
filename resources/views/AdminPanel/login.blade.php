<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>لوحة التحكم | دكتور هاني موريس</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/vendors/core/core.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ URL::asset('assets/css/demo_1/style.css') }}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}" />
</head>
<body class="rtl">
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">دكتور <span>هاني موريس</span></a>
					@if(session()->has('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}
					</div>
					@endif
					@if(session()->has('error'))
					<div class="alert alert-danger">
						{{ session()->get('error') }}
					</div>
					@endif

                    <h5 class="text-muted font-weight-normal mb-4">اهلا برجوعك، برجاء الدخول الي حسابك</h5>
                    <form class="forms-sample" action="{{ route('admin.login_post') }}" method="POST">
					@csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">البريد الالكتروني</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="البريد الالكتروني">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">كلمة المرور</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="كلمة المرور">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input">
                          تذكرني
                        </label>
                      </div>
                      <div class="mt-3">
						<button type="submit" class="btn btn-primary text-white ml-2 mb-2 mb-md-0">تسجيل الدخول</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ URL::asset('assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ URL::asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/template.js') }}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
	<!-- end custom js for this page -->
</body>
</html>