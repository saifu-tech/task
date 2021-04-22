<!doctype html>
<html class="fixed sidebar-left-collapsed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Task</title>
		<meta name="keywords" content="Task" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">
		<meta name="_token" content="{!! csrf_token()!!} " />	

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/backend/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/backend/vendor/animate/animate.css">

		<link rel="stylesheet" href="/backend/vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="/backend/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="/backend/vendor/owl.carousel/assets/owl.carousel.css" />
		<link rel="stylesheet" href="/backend/vendor/owl.carousel/assets/owl.theme.default.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/backend/css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/backend/css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/backend/css/custom.css">

		<!-- Head Libs -->
		<script src="/backend/vendor/modernizr/modernizr.js"></script>
		  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
		<style>
			[ng\:cloak], [ng-cloak], .ng-cloak {
				display: none !important;
			}
		</style>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="{{ route('homepage') }}" class="logo">
						<h1 style="margin: 0;">Task</h1>
						{{-- <img src="/img/logo.png" width="75" height="35" alt="Porto Admin" /> --}}
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<form action="javascript:;" class="search nav-form">
						<div class="input-group">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-append">
								<button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="/#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="/backend/img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{ Auth::user()->name }}</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								{{-- <li>
									<a role="menuitem" tabindex="-1" href="javascript:;"><i class="fas fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/#" data-lock-screen="true"><i class="fas fa-lock"></i> Lock Screen</a>
								</li> --}}
								<li>
									<a role="menuitem" tabindex="-1" href="{{ route('logout') }}"><i class="fas fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->
			<div class="inner-wrapper">
				@include('sidebar')		

				<section role="main" class="content-body pb-0">
					<header class="page-header">
						@yield('pageheader')
					</header>
					@yield('maincontent')
				</section>
			</div>

		</section>

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
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="/backend/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="/backend/vendor/owl.carousel/owl.carousel.js"></script>
		<script src="/backend/vendor/isotope/isotope.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/backend/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/backend/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/backend/js/theme.init.js"></script>

		<!-- Examples -->
		<script src="/backend/js/examples/examples.landing.dashboard.js"></script>
		<script src='/backend/js/angular.min.js'></script>
		@yield('javascript')

	</body>
</html>