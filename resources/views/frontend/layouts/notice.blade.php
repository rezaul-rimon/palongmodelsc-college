<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>নোটিশ</span> বোর্ড</h2>
					<p>আমাদের স্কুল ও কলেজের প্রতিটি নিউজ এবং নোটিশ নিয়মিত হালনাগাদ রাখা হয়</p>
				</div>
			</div>
			
			<style>
				/* Add this to your CSS stylesheet or in a <style> tag in your HTML */
				.pricing-entry {
					height: 350px; /* Set a fixed height for pricing-entry */
					display: flex;
					flex-direction: column;
					position: relative;
				}
			
				.button-container {
					position: absolute;
					bottom: 0;
					width: 100%;
					text-align: center;
				}
			
				.button-container a {
					display: inline-block;
					padding: 10px;
					transition: background-color 0.3s;
				}
			
				.button-container a:hover {
					background-color: #ccc; /* Add a background color on hover */
				}
			</style>
			
			<div class="row">
				@php
					$buttonClasses = ['btn-quarternary', 'btn-primary', 'btn-secondary', 'btn-tertiary'];
					use Illuminate\Support\Str;
				@endphp
				@forelse ($notices->take(4) as $item)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="pricing-entry bg-light pb-3 text-center">
						<div>
							<h4 class="mb-0">
								{{ Str::limit($item->notice_type, 20, '...') }}
							</h4>					
						</div>
						<div class="px-4">
							<p class="" style="text-align: center;">
								{{ Str::limit($item->notice_summary, 165, '...') }}
							</p>
						</div>						
												
						<div class="button-container">
							<a target="_blank" href="{{ asset('Resources/Notice/Files/' . $item->notice_file) }}" class="btn {{ $buttonClasses[$loop->iteration % count($buttonClasses)] }} px-4 py-3">বিস্তারিত</a>
						</div>						
					</div>
				</div>
				@empty
					
				@endforelse
			</div>
			
			{{-- @if($all_notice_show === 'no')
			<div class="text-center mt-3">
				<a href="{{ route('frontend.notice_events') }}" class="btn btn-primary">সকল নোটিশ দেখুন</a>
			</div>
			@endif --}}
		</div>
	</section>