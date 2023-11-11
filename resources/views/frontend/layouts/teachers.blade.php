<section class="ftco-section ftco-no-pb">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>সম্মানিত</span> শিক্ষক মহোদয়গন</h2>
					<p>Separated they live in. A small river named Duden flows by their place and supplies it with the
						necessary regelialia. It is a paradisematic country</p>
				</div>
			</div>
			<div class="row">
<script>
	/* Custom CSS for handling image aspect ratio */
@media (max-width: 767px) {
    .img.align-self-stretch {
        height: auto;
    }
}

</script>
				@forelse ($teachers as $item)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="staff">
						<div class="img-wrap d-flex align-items-stretch">
							<div class="img align-self-stretch" style="background-image: url('{{ asset('Resources/Teachers/Photos/' . $item->teacher_photo) }}');"></div>
						</div>
						<div class="text pt-3 text-center">
							<h3>{{ $item->teacher_name }}</h3>
							<span class="position mb-2">{{ $item->teacher_designation }}</span>
							<div class="faded">
								<p>{{ $item->teacher_description }}</p>
								<ul class="ftco-social text-center">
									<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
									<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>				
				@empty
					
				@endforelse

			</div>
		</div>
	</section>