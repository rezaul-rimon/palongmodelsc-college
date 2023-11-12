<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>বৃত্তি-প্রাপ্ত </span>ছাত্র-ছাত্রীর তালিকা</h2>
					<p>Separated they live in. A small river named Duden flows by their place and supplies it with the
						necessary regelialia. It is a paradisematic country</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped text-center" style="font-size: 20px;">
						<thead>
							<tr>
								<th class="align-middle" rowspan="2" style="width: 7%;">ক্রম</th>
								<th class="align-middle" rowspan="2" style="width: 13%;">শ্রেণী</th>
								<th class="align-middle" colspan="3" style="width: 40%;">উপবৃত্তি</th>
								<th class="align-middle" colspan="3" style="width: 40%;">সরকারী বৃত্তি</th>
							</tr>
							<tr>
								<th class="align-middle" style="width: 13%;">ছাত্র</th>
								<th class="align-middle" style="width: 13%;">ছাত্রী</th>
								<th class="align-middle" style="width: 14%;">মোট</th>
								<th class="align-middle" style="width: 13%;">ছাত্র</th>
								<th class="align-middle" style="width: 13%;">ছাত্রী</th>
								<th class="align-middle" style="width: 14%;">মোট</th>
							</tr>
						</thead>

						@php
							$total_gov_male = 0;
							$total_gov_female = 0;
							$total_sub_male = 0;
							$total_sub_female = 0;
							$total_buddhist = 0;
							$final_gov_total = 0;
							$final_sub_total = 0;
							use App\Helpers\AppHelper;
						@endphp

						<tbody>
							@forelse ($stipend_students as $item)
							@php
								$total_gov = $item->gov_stipend_male + $item->gov_stipend_female;
								$total_sub = $item->sub_stipend_male + $item->sub_stipend_female;

								$total_gov_male +=  $item->gov_stipend_male;
								$total_gov_female += $item->gov_stipend_female;
								$total_sub_male += $item->sub_stipend_male;
								$total_sub_female += $item->sub_stipend_female;
								$final_gov_total += $total_gov;
								$final_sub_total += $total_sub;
							@endphp
								<tr>
									<td class="align-middle">{{ AppHelper::en2bn($loop->iteration) }}</td>
									<td class="align-middle">{{ AppHelper::en2bn_class($item->class_name) }}</td>
									<td class="align-middle">{{ AppHelper::en2bn($item->sub_stipend_male) }}</td>
									<td class="align-middle">{{ AppHelper::en2bn($item->sub_stipend_female) }}</td>
									<td class="align-middle" style="font-weight: bold;">{{ AppHelper::en2bn($total_sub) }}</td>
									<td class="align-middle">{{ AppHelper::en2bn($item->gov_stipend_male) }}</td>
									<td class="align-middle">{{ AppHelper::en2bn($item->gov_stipend_female) }}</td>
									<td class="align-middle" style="font-weight: bold;">{{ AppHelper::en2bn($total_gov) }}</td>
								</tr>
							@empty
							<tr>
								<td class="text-danger fw-bold" colspan="8">এই পর্যন্ত কোন বৃত্তিপ্রাপ্ত শ্রেণী যুক্ত করা হয়নি।</td>
							</tr>
							@endforelse
						</tbody>

						<tfoot>
							<tr>
								<th colspan="2">মোট</th>
								<th>{{ AppHelper::en2bn($total_sub_male) }}</th>
								<th>{{ AppHelper::en2bn($total_sub_female) }}</th>
								<th>{{ AppHelper::en2bn($final_sub_total) }}</th>
								<th>{{ AppHelper::en2bn($total_gov_male) }}</th>
								<th>{{ AppHelper::en2bn($total_gov_female) }}</th>
								<th>{{ AppHelper::en2bn($final_gov_total) }}</th>
							</tr>							
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</section>