<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-5">
						<h2 class="ftco-heading-2">আমাদের ঠিকানা</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">রত্নাপালং, উখিয়া,
										কক্সবাজার-৪৭৫০, বাংলাদেশ</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-5">
						<h2 class="ftco-heading-2">সর্বশেষ ব্লগ</h2>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url({{ asset('frontend') }}/images/image_1.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
								</h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-5 d-flex">
							<a class="blog-img mr-4" style="background-image: url({{ asset('frontend') }}/images/image_2.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a>
								</h3>
								<div class="meta">
									<div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
									<div><a href="#"><span class="icon-person"></span> Admin</a></div>
									<div><a href="#"><span class="icon-chat"></span> 19</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-5 ml-md-4">
						<h2 class="ftco-heading-2">Links</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
							<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
							<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
							<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Deparments</a></li>
							<li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="ftco-footer-widget mb-5">
						<h2 class="ftco-heading-2">Subscribe Us!</h2>
						<form action="#" class="subscribe-form">
							<div class="form-group">
								<input type="text" class="form-control mb-2 text-center"
									placeholder="Enter email address">
								<input type="submit" value="Subscribe" class="form-control submit px-3">
							</div>
						</form>
					</div>
					<div class="ftco-footer-widget mb-5">
						<h2 class="ftco-heading-2 mb-0">আমাদের সাথে যুক্ত হোন</h2>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						কপিরাইট &copy;<script>
							document.write(new Date().getFullYear());
						</script> সকল সত্বাধিকারী পালং আদর্শ স্কুল ও কলেজ | This template is made with <i
							class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
							target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>

	<script>
		// Get the current date
		var currentDate = new Date();

		// Format the date as "31 August 2023"
		var day = currentDate.getDate();
		var monthIndex = currentDate.getMonth();
		var year = currentDate.getFullYear();
		var dayOfWeekIndex = currentDate.getDay(); // Index of the day in the week

		// Define days of the week
		var daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

		var months = [
			"January", "February", "March", "April", "May", "June",
			"July", "August", "September", "October", "November", "December"
		];

		var formattedDate = day + " " + months[monthIndex] + " " + year + " (" + daysOfWeek[dayOfWeekIndex] + ")";

		// Display the formatted date in the "currentDate" element
		document.getElementById("currentDate").textContent = formattedDate;
	</script>

	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('frontend/header/js/all.min.js') }}"></script>
	<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/js/aos.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
	<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
	</script>
	
	<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('frontend/js/google-map.js') }}"></script>

</body>

</html>