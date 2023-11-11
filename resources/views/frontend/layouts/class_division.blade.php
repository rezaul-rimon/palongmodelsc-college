<section class="ftco-section ftco-no-pb">
	@php
		use App\Helpers\AppHelper;
	@endphp

	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h2 class="mb-4"><span>আমাদের</span> শেণী বিভাজন</h2>
				<p>Separated they live in. A small river named Duden flows by their place and supplies it with the
					necessary regelialia. It is a paradisematic country</p>
			</div>
		</div>
		<div class="row">

			<div class="col-md-6 course d-lg-flex ftco-animate">
				<div class="img" style="background-image: url({{ asset('frontend') }}/images/dept/science.png);"></div>
				<div class="text bg-light p-4">
					<h3><a href="#">বিজ্ঞান বিভাগ</a></h3>
					<p class="subheading"><span>ক্লাস টাইম:</span> সকাল ১০টা - বিকাল ৪টা</p>
					<table class="table table-bordered text-center student-table">
						<thead>
							<tr>
								<th>শ্রেণী</th>
								<th>ছাত্র</th>
								<th>ছাত্রী</th>
								<th>মোট</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>১০ম</td>
								<td>{{ AppHelper::en2bn($class_10_sc['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_10_sc['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_10_sc['male'] + $class_10_sc['female']) }}</th>
							</tr>
							<tr>
								<td>৯ম</td>
								<td>{{ AppHelper::en2bn($class_9_sc['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_9_sc['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_9_sc['male'] + $class_9_sc['female']) }}</th>
							</tr>
						</tbody>
						<tfoot>
							<th>মোট</th>
							<td>{{ AppHelper::en2bn($class_10_sc['male'] + $class_9_sc['male']) }}</td>
							<td>{{ AppHelper::en2bn($class_10_sc['female'] + $class_9_sc['female']) }}</td>
							<th>{{ AppHelper::en2bn($class_10_sc['male'] + $class_9_sc['male'] + $class_10_sc['female'] + $class_9_sc['female']) }}</th>
						</tfoot>						
					</table>
				</div>
			</div>
			
			<div class="col-md-6 course d-lg-flex ftco-animate">
				<div class="img" style="background-image: url({{ asset('frontend') }}/images/dept/business.png);"></div>
				<div class="text bg-light p-4">
					<h3><a href="#">ব্যাবসায় শিক্ষা</a></h3>
					<p class="subheading"><span>ক্লাস টাইম:</span> সকাল ১০টা - বিকাল ৪টা</p>
					<table class="table table-bordered text-center student-table">
						<thead>
							<th>শ্রেণী</th>
							<th>ছাত্র</th>
							<th>ছাত্রী</th>
							<th>মোট</th>
						</thead>
						<tbody>
							<tr>
								<td>১০ম</td>
								<td>{{ AppHelper::en2bn($class_10_com['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_10_com['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_10_com['male'] + $class_10_com['female']) }}</th>
							</tr>
							<tr>
								<td>৯ম</td>
								<td>{{ AppHelper::en2bn($class_9_com['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_9_com['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_9_com['male'] + $class_9_com['female']) }}</th>
							</tr>
						</tbody>
						<tfoot>
							<th>মোট</th>
							<td>{{ AppHelper::en2bn($class_10_com['male'] + $class_9_com['male']) }}</td>
							<td>{{ AppHelper::en2bn($class_10_com['female'] + $class_9_com['female']) }}</td>
							<th>{{ AppHelper::en2bn($class_10_com['male'] + $class_9_com['male'] + $class_10_com['female'] + $class_9_com['female']) }}</th>
						</tfoot>
						
					</table>
				</div>
			</div>

			<div class="col-md-6 course d-lg-flex ftco-animate">
				<div class="img" style="background-image: url({{ asset('frontend') }}/images/dept/arts.png);"></div>
				<div class="text bg-light p-4">
					<h3><a href="#">মানবিক বিভাগ</a></h3>
					<p class="subheading"><span>ক্লাস টাইম:</span> সকাল ১০টা - বিকাল ৪টা</p>
					<table class="table table-bordered text-center student-table">
						<thead>
							<th>শ্রেণী</th>
							<th>ছাত্র</th>
							<th>ছাত্রী</th>
							<th>মোট</th>
						</thead>
						<tbody>
							<tr>
								<td>১০ম</td>
								<td>{{ AppHelper::en2bn($class_10_ar['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_10_ar['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_10_ar['male'] + $class_10_ar['female']) }}</th>
							</tr>
							<tr>
								<td>৯ম</td>
								<td>{{ AppHelper::en2bn($class_9_ar['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_9_ar['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_9_ar['male'] + $class_9_ar['female']) }}</th>
							</tr>
						</tbody>
						<tfoot>
							<th>মোট</th>
							<td>{{ AppHelper::en2bn($class_10_ar['male'] + $class_9_ar['male']) }}</td>
							<td>{{ AppHelper::en2bn($class_10_ar['female'] + $class_9_ar['female']) }}</td>
							<th>{{ AppHelper::en2bn($class_10_ar['male'] + $class_9_ar['male'] + $class_10_ar['female'] + $class_9_ar['female']) }}</th>
						</tfoot>
						
					</table>
				</div>
			</div>

			<div class="col-md-6 course d-lg-flex ftco-animate">
				<div class="img" style="background-image: url({{ asset('frontend') }}/images/dept/civil.png);"></div>
				<div class="text bg-light p-4">
					<h3><a href="#">সিভিল কন্সট্রাকশন (ভোকেশনাল)</a></h3>
					<p class="subheading"><span>ক্লাস টাইম:</span> সকাল ১০টা - বিকাল ৪টা</p>
					<table class="table table-bordered text-center student-table">
						<thead>
							<th>শ্রেণী</th>
							<th>ছাত্র</th>
							<th>ছাত্রী</th>
							<th>মোট</th>
						</thead>
						<tbody>
							<tr>
								<td>১০ম</td>
								<td>{{ AppHelper::en2bn($class_10_cv['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_10_cv['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_10_cv['male'] + $class_10_cv['female']) }}</th>
							</tr>
							<tr>
								<td>৯ম</td>
								<td>{{ AppHelper::en2bn($class_9_cv['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_9_cv['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_9_cv['male'] + $class_9_cv['female']) }}</th>
							</tr>
						</tbody>
						<tfoot>
							<th>মোট</th>
							<td>{{ AppHelper::en2bn($class_10_cv['male'] + $class_9_cv['male']) }}</td>
							<td>{{ AppHelper::en2bn($class_10_cv['female'] + $class_9_cv['female']) }}</td>
							<th>{{ AppHelper::en2bn($class_10_cv['male'] + $class_9_cv['male'] + $class_10_cv['female'] + $class_9_cv['female']) }}</th>
						</tfoot>
					</table>
				</div>
			</div>

			<div class="col-md-6 course d-lg-flex ftco-animate">
				<div class="img" style="background-image: url({{ asset('frontend') }}/images/dept/it_suppoer.png);"></div>
				<div class="text bg-light p-4">
					<h3><a href="#">আইটি সাপোর্ট এন্ড আইওটি বেসিক (ভোকেশনাল)</a></h3>
					<p class="subheading"><span>ক্লাস টাইম:</span> সকাল ১০টা - বিকাল ৪টা</p>
					<table class="table table-bordered text-center student-table">
						<thead>
							<th>শ্রেণী</th>
							<th>ছাত্র</th>
							<th>ছাত্রী</th>
							<th>মোট</th>
						</thead>
						<tbody>
							<tr>
								<td>১০ম</td>
								<td>{{ AppHelper::en2bn($class_10_comp['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_10_comp['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_10_comp['male'] + $class_10_comp['female']) }}</th>
							</tr>
							<tr>
								<td>৯ম</td>
								<td>{{ AppHelper::en2bn($class_9_comp['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_9_comp['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_9_comp['male'] + $class_9_comp['female']) }}</th>
							</tr>
						</tbody>
						<tfoot>
							<th>মোট</th>
							<td>{{ AppHelper::en2bn($class_10_comp['male'] + $class_9_comp['male']) }}</td>
							<td>{{ AppHelper::en2bn($class_10_comp['female'] + $class_9_comp['female']) }}</td>
							<th>{{ AppHelper::en2bn($class_10_comp['male'] + $class_9_comp['male'] + $class_10_comp['female'] + $class_9_comp['female']) }}</th>
						</tfoot>
					</table>
				</div>
			</div>

			<div class="col-md-6 course d-lg-flex ftco-animate">
				<div class="img" style="background-image: url({{ asset('frontend') }}/images/course-2.jpg);"></div>
				<div class="text bg-light p-4">
					<h3><a href="#">৬ষ্ঠ থেকে ৮ম শ্রেণী</a></h3>
					<p class="subheading"><span>ক্লাস টাইম:</span> সকাল ১০টা - বিকাল ৪টা</p>
					<table class="table table-bordered text-center student-table">
						<thead>
							<th>শ্রেণী</th>
							<th>ছাত্র</th>
							<th>ছাত্রী</th>
							<th>মোট</th>
						</thead>

						<tbody>
							<tr>
								<td>{{ AppHelper::en2bn('৬ষ্ঠ') }}</td>
								<td>{{ AppHelper::en2bn($class_6['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_6['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_6['male'] + $class_6['female']) }}</th>
							</tr>
							<tr>
								<td>{{ AppHelper::en2bn('৭ম') }}</td>
								<td>{{ AppHelper::en2bn($class_7['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_7['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_7['male'] + $class_7['female']) }}</th>
							</tr>
							<tr>
								<td>{{ AppHelper::en2bn('৮ম') }}</td>
								<td>{{ AppHelper::en2bn($class_8['male']) }}</td>
								<td>{{ AppHelper::en2bn($class_8['female']) }}</td>
								<th>{{ AppHelper::en2bn($class_8['male'] + $class_8['female']) }}</th>
							</tr>
						</tbody>
						
						<tfoot>
							<th>{{ AppHelper::en2bn('মোট') }}</th>
							<th>{{ AppHelper::en2bn($class_6['male'] + $class_7['male'] + $class_8['male']) }}</th>
							<th>{{ AppHelper::en2bn($class_6['female'] + $class_7['female'] + $class_8['female']) }}</th>
							<th>{{ AppHelper::en2bn($class_6['male'] + $class_7['male'] + $class_8['male'] + $class_6['female'] + $class_7['female'] + $class_8['female']) }}</th>
						</tfoot>
						
					</table>
				</div>
			</div>
		</div>
	</div>
</section>