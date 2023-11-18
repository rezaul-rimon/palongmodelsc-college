<footer class="ftco-footer ftco-bg-dark ftco-section" style="padding: 20px 10px 5px 10px !important">
    <div class="container">
        <div class="row">
			@php
				use App\Helpers\AppHelper;
			@endphp
            <div class="col-md-12 text-center">
                <p style="font-size: 17px;">কপিরাইট &copy; {{ AppHelper::en2bn(now()->year) }} সকল সত্বাধিকারী পালং আদর্শ স্কুল ও কলেজ <br> This website is made with <span style="color: burlywood">Md. Rezaul Islam Khan</span> 
					{{-- <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> --}}
				</p>
            </div>
        </div>
    </div>
</footer>


	<!-- loader -->
	{{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div> --}}

				
	<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('frontend/header/js/all.min.js') }}"></script>
	<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	{{-- <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script> --}}
	<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
	<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>