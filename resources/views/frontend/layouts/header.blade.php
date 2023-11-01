<!DOCTYPE html>
<html lang="en">

<head>
	<title>পালং আদর্শ উচ্চ বিদ্যালয় ও কলেজ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">

	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

	<link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

	<link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

	<link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
	
	<link rel="stylesheet" href="{{ asset('frontend/header/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/header/css/style.css') }}">

	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

	<style>
		/* Custom CSS to make the navbar narrower */
		.navbar {
			padding: 0rem 0.5rem;
		}

		.navbar-nav .nav-link {
			font-size: 15px;
			/* Adjust the font size as needed */
		}


		/* Custom CSS for nav-item box and hover effect */
		.navbar-nav .nav-item {
			padding: 0px;
			background-color: whitesmoke;
		}

		.navbar-nav .nav-item .nav-link {
			border-right: 2px solid #ccc;
		}
		.nv-start{
			border-left: 2px solid #ccc;
		}

		.navbar-nav .nav-item:hover {
			background-color: #fda638;
		}

		.header-main {
			border-bottom: 1px solid #ccc;
		}

		.student-table{
			font-size: 15px;
		}


		/* Custom CSS for centering on small and medium devices */
		@media only screen and (max-width: 768px) {
			.center-content {
				justify-content: center;
			}

			.logo,
			.name,
			.ein-number {
				align-items: center;
			}

			.logo img {
				height: 100px;
			}

		}
	</style>
</head>

<body>

	<!-- <h1 class="text-primary text-center">Hello World</h1> -->
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-5 col-sm-12 py-1 center-content">
					<!-- <p>Palong Model High School and College</p> -->
					<p><i class="fas fa-location-dot"></i> Ratnapalong, Ukhiya, Cox's Bazar</p>
				</div>
				<div class="col-lg-4 col-md-3 col-sm-12 py-1 center-content">
					<!-- <p><i class="fas fa-phone"></i> +880 1712-345678</p> -->
					<p id="currentDate"></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 py-1 center-content">
					<!-- <p id="currentDate"></p> -->
				</div>
			</div>
		</div>
	</div>

	<div class="header-main shadow">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-12">
					<div class="name">
						<h2 class="bn-name"> পালং আদর্শ উচ্চ বিদ্যালয় ও কলেজ </h2>
						<h2 class="en-name">Palong Model High School and College</h2>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-12">
					<div class="logo">
						<img src="{{ asset('frontend/header/img/logo.png') }}" alt="LOGO">
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-12">
					<div class="regi-number">
                        <h2 class="eiin-no">EIIN Number: 106425</h2>
						<h2 class="tech-code">কারিগরি কোডঃ ৭৪০৭৭</h2>
                        <h2 class="mpo-code">MPO Code: 106425</h2>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<nav class="navbar navbar-expand-md navbar-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link nv-start" href="index.html">হোম <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">আমাদের সম্পর্কে</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">শিক্ষক মন্ডলী</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">নোটিশ বোর্ড</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">শ্রেণী বিণ্যাস</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">আপকামিং ইভেন্ট</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">ফটো গ্যালারী</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">যোগাযোগ</a>
					</li>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Dropdown
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li> -->
					<!-- <li class="nav-item">
						<a class="nav-link disabled" href="#">Disabled</a>
					</li> -->
				</ul>
			</div>
		</nav>
	</div>

	<div class="notice">
		<div class="container">
			<div class="row">
				<div class="col-lg-1 col-md-2 col-3 update">
					<span>আপডেট</span>
				</div>
				<div class="col-lg-11 col-md-10 col-9 up-text">
					<p><marquee scrollamount="5" behavior="alternate" direction="left">শিক্ষা মন্ত্রনালয়ের ২৮ মার্চ ২০২১ খ্রিঃ তারিখের ৩৭.00.0000.098.030.০০১.২০১৭(অংশ-১) ১২১ নং স্মারকের জনবল কাঠামো মোতাবেক কক্সবাজার জেলার উখিয়া উপজেলাধীন পালং আদর্শ উচ্চ বিদ্যালয়-এর ভারপ্রাপ্ত প্রধান শিক্ষকের আবেদনের প্রেক্ষিতে নিম্নোলিখিত পদে সরকারি বিধি মোতাবেক নিয়োগের জন্য অনুমতি দেয়া গেল।</marquee></p>
				</div>
			</div>
		</div>
	</div>