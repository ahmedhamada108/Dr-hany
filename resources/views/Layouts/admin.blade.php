<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>لوحة التحكم | دكتور هاني</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ URL::asset('assets/vendors/core/core.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<link rel="stylesheet" href="{{ URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
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
<body class="rtl settings-open sidebar-dark">
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          دكتور <span> هاني </span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">رئيسية</li>
          <li class="nav-item" style="padding-top: 10px;">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
				<i class="fa-solid fa-gauge-high"></i>
              <span class="link-title">لوحة التحكم</span>
            </a>
		</li>
			<li class="nav-item nav-category">ادارات</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('slider.index') }}" class="nav-link">
					<i class="link-icon" data-feather="image"></i>
					<span class="link-title">ادارة الصور</span>
				</a>
			</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('awards.index') }}" class="nav-link">
					<i class="link-icon" data-feather="award"></i>
					<span class="link-title">ادارة الجوائز</span>
				</a>
			</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('medical_services.index') }}" class="nav-link">
					<i class="fa-solid fa-suitcase-medical"></i>
					<span class="link-title">ادارة الخدمات الطبية</span>
				</a>
			</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('Specialties_Surgeries.index') }}" class="nav-link">
					<i class="fa-solid fa-heart-pulse"></i>					
					<span class="link-title">ادارة التخصصات والجراحات</span>
				</a>
			</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('gallery.index') }}" class="nav-link">
					<i class="fa-regular fa-images"></i>					
					<span class="link-title">ادارة معرض الصور</span>
				</a>
			</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('feedback.index') }}" class="nav-link">
					<i class="fa-solid fa-comments"></i>
					<span class="link-title">ادارة راي العملاء</span>
				</a>
			</li>
			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('admins.index') }}" class="nav-link">
					<i class="fa-solid fa-users-gear"></i>
					<span class="link-title">ادارة المسؤولين</span>
				</a>
			</li>
			<li class="nav-item nav-category">ادارة الموقع</li>

			<li class="nav-item" style="padding-top: 10px;">
				<a href="{{ route('website_settings.index') }}" class="nav-link">
					<i class="fa-solid fa-gears"></i>
					<span class="link-title">ادارة اعدادات الموقع</span>
				</a>
			</li>
        </ul>
		  </li>
      </div>
    </nav>
		<div class="page-wrapper">	
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="https://via.placeholder.com/30x30" alt="userr">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="https://via.placeholder.com/80x80" alt="">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0">{{auth('admins')->user()->name}}</p>
										<p class="email text-muted mb-3">{{ auth('admins')->user()->email }}</p>
									</div>
								</div>
								<div class="dropdown-body" >
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a style="cursor: pointer;padding: 0px !important;" class="dropdown-item" data-toggle="modal" data-target="#exampleModaledit{{ auth('admins')->id() }}" data-whatever="@mdo">
												<i class="fa-solid fa-user-pen"></i>											
												 تعديل 
											</a>
											</a>
										</li>
										<li class="nav-item">
											<a  href="{{ route('admin.logout') }}" class="nav-link">
												<i class="fa-solid fa-arrow-right-from-bracket"></i>
												<span> تسجيل خروج </span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
                {{-- Start Modal Editing the admin --}}
				<div class="modal fade" id="exampleModaledit{{ auth('admins')->id() }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">تعديل الحساب</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
						<div class="modal-body">
						<form action="{{ route('admins.update',auth('admins')->id() ) }}" method="post">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">اسم الحساب:</label>
								<input type="text" name="name" class="form-control" id="recipient-name" value="{{ auth('admins')->user()->name }}">
								</div>
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">البريد الالكتروني:</label>
									<input type="email" name="email" class="form-control" id="recipient-name" value="{{ auth('admins')->user()->email }}">
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
			<!-- partial -->
            @yield('content')

            
			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
				<p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>. All rights reserved</p>
				<p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary mr-1 icon-small" data-feather="heart"></i></p>
			</footer>
			<!-- partial -->


	<!-- core:js -->
	<script src="{{ URL::asset('assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ URL::asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ URL::asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ URL::asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ URL::asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/template.js') }}"></script>
	<!-- endinject -->
  <!-- custom js for this page -->
  <script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
  <script src="https://kit.fontawesome.com/cb2611cb8b.js" crossorigin="anonymous"></script>
	<!-- end custom js for this page -->
</body>
</html>    