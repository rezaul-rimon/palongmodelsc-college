<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>আপকামিং</span> ইভেন্ট</h2>
					<p>আমাদের স্কুল ও কলেজের সদ্য অনুষ্টিত এবং আপকামিং সকল ইভেন্ট সংক্রান্ত যাবতীয় তথ্যাদি এইখানে
						হালনাগাদ রাখা হয়</p>
				</div>
			</div>
			<style>
				.blog-entry {
					position: relative;
					height: 100%;
					text-align: center;
				}
				.text {
					height: 250px; /* Set your desired height */
					overflow: hidden;
					display: flex;
					flex-direction: column;
				}
				.btn-read-more {
					position: absolute;
					bottom: 10px;
					left: 0;
					width: 100%;
					text-align: center;
					padding: 5px;
				}
			
			</style>
			
			<div class="row">
				@php
					use App\Helpers\AppHelper;
					use Illuminate\Support\Str;
				@endphp
				@forelse ($events as $item)
				<div class="col-md-6 col-lg-4 ftco-animate">
					<div class="blog-entry">
						@if($item->event_photo != null)
							<a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('{{ asset('Resources/Event/Photos/' . $item->event_photo) }}'); background-size: cover; background-position: center;">
						@else
							<a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('{{ asset('Resources/Event/Photos/event.jpg') }}'); background-size: cover; background-position: center;">
						@endif
							<div class="meta-date text-center p-2">
								@php
									$carbonDate = \Carbon\Carbon::parse($item->event_date);
								@endphp
								<span class="day">{{ AppHelper::en2bn($carbonDate->format('d')) }}</span>
								<span style="font-size: 17px;" class="mos">{{ AppHelper::en2bnMonth($carbonDate->format('F')) }}</span>
								<span style="font-size: 17px;" class="yr">{{ AppHelper::en2bn($carbonDate->format('Y')) }}</span>
							</div>							
						</a>
						<div class="text bg-white p-4">
							<h4 class="heading"><a href="#">{{ Str::limit($item->event_name, 45, '...') }}</a></h4>
							<p>{{ Str::limit($item->event_description, 210, '...') }}</p>
							<div class="btn-read-more">
								<a href="#" class="btn btn-primary">আরো পড়ুন <span class="ion-ios-arrow-round-forward"></span></a>
							</div>
						</div>
					</div>
				</div>
				@empty
				<div class="mt-3">
					<h2 class="text-secondary font-bold text-4xl mb-2" style="text-align: center;">আমাদের প্ল্যানে আপাতত কোন আপকামিং ইভেন্ট নেই, কোন ইভেন্টের প্ল্যান হওইয়া মাত্রই জানিয়ে দেয়া হবে। </h2>
				</div>				
				@endforelse
			
				<!-- Repeat the above structure for other items -->
			
			</div>
			
			
		</div>
	</section>
