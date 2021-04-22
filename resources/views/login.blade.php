<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/backend/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/backend/vendor/animate/animate.css">

		<link rel="stylesheet" href="/backend/vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="/backend/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/backend/css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/backend/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/backend/css/custom.css">

		<!-- Head Libs -->
		<script src="/backend/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo float-left">
					<h1 style="margin: 0;">Task</h1>
					{{-- <img src="img/logo.png" height="54" alt="Porto Admin" /> --}}
				</a>

				<div class="panel card-sign">
					<div class="card-title-sign mt-3 text-right">
						<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign In</h2>
					</div>
					<div class="card-body">
						<form action="{{ route('loginpost') }}" method="post">
							@csrf

							@if (Session::has('error'))
								<div class="alert alert-danger">{{ Session::get('error') }}</div>
							@endif
							<div class="form-group mb-3">
								<label>Username</label>
								<div class="input-group">
									<input name="username" type="text" class="form-control form-control-lg" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-user"></i>
										</span>
									</span>
								</div>
								@if ($errors->has('username')) 
									<div class="validation-error errorActive">{!! $errors->first('username') !!}</div> 
								@endif
							</div>

							<div class="form-group mb-3">
								<div class="clearfix" style="display: none;">
									<label class="float-left">Password</label>
									<a href="javascript:;" class="float-right">Lost Password?</a>
								</div>
								<div class="input-group">
									<input name="password" type="password" class="form-control form-control-lg" />
									<span class="input-group-append">
										<span class="input-group-text">
											<i class="fas fa-lock"></i>
										</span>
									</span>
								</div>
								@if ($errors->has('password')) 
									<div class="validation-error errorActive">{!! $errors->first('password') !!}</div> 
								@endif
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary mt-2">Sign In</button>
								</div>
							</div>												

							

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-3 mb-3">&copy; Copyright {{ date('Y') }}. All Rights Reserved.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="/backend/vendor/jquery/jquery.js"></script>
		<script src="/backend/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/backend/vendor/popper/umd/popper.min.js"></script>
		<script src="/backend/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/backend/vendor/common/common.js"></script>
		<script src="/backend/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/backend/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/backend/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/backend/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/backend/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/backend/js/theme.init.js"></script>

	</body>
</html>