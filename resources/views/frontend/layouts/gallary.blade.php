<section class="ftco-gallery">
	<style>
		.gallery-item {
			position: relative;
			overflow: hidden;
		}
	
		.hover-content {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(00, 101, 162, 0.3); /* Adjust the background color and opacity as needed */
			color: #fff; /* Adjust the text color as needed */
			display: none;
			align-items: center;
			justify-content: center;
			text-align: center;
			padding: 0 40px;
		}
	
		.gallery-item:hover .hover-content {
			display: flex;
		}
	</style>

		<div class="container-wrap">
			<div class="row justify-content-center my-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>ফটো</span> গ্যালারী</h2>
					<p>আমাদের স্কুল ও কলেজের সদ্য অনুষ্টিত সকল ইভেন্ট এর ছবি এইখানে হালনাগাদ রাখা হয়</p>
				</div>
			</div>
			<div class="row no-gutters">
				@forelse ($galleryItems->take(8) as $items)
					{{-- @foreach ($items->image_paths as $image) --}}
					@foreach (array_slice($items->image_paths, 0, 1) as $image)
						<div class="col-md-3 ftco-animate">
							<div class="gallery-item">
								<a href="{{ route('frontend.gallery_page') }}" class="gallery image-popup img d-flex align-items-center"
									style="background-image: url({{ asset('storage/app/public/Resources/Gallery/Photos/' . $image) }});">
									<div class="hover-content">
										<span>{{ $items->gallery_title }}</span>
									</div>
								</a>
							</div>
						</div>
					@endforeach
				@empty
				<div class="mt-3 col-md-8 offset-md-2">
					<h2 class="text-secondary font-bold text-4xl mb-2" style="text-align: center;">আপাতত কোন গ্যালারী ইমেজ নেই।</h2>
				</div>
				@endforelse
			</div>		
		</div>
	</section>