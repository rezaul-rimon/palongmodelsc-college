<section class="ftco-section ftco-no-pb">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>আমাদের সকল </span>ছাত্র-ছাত্রীর তালিকা</h2>
					<p>Separated they live in. A small river named Duden flows by their place and supplies it with the
						necessary regelialia. It is a paradisematic country</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-bordered text-center" style="font-size: 20px;">
						<colgroup>
							<col style="width: 5%;">
							<col style="width: 11%;">
							<col style="width: 15%;">
							<col style="width: 11%;">
							<col style="width: 11%;">
							<col style="width: 12%;">
							<col style="width: 11%;">
							<col style="width: 11%;">
							<col style="width: 13%;">
						</colgroup>
						<thead>
							<tr>
								<th>ক্রম</th>
								<th>শ্রেণী</th>
								<th>শাখা</th>
								<th>ছাত্র</th>
								<th>ছাত্রী</th>
								<th>মুসলিম</th>
								<th>হিন্দু</th>
								<th>বৌদ্ধ</th>
								<th>মোট</th>
							</tr>
						</thead>

						@php
							$total_section = 0;
							$total_male = 0;
							$total_female = 0;
							$total_muslim = 0;
							$total_hindu = 0;
							$total_buddhist = 0;
							$final_total = 0;
							use App\Helpers\AppHelper;
						@endphp

						<tbody>
							@forelse($students as $item)
							@php
								$total = $item->male_students + $item->female_students;
								$muslim = $total - $item->hindu_students - $item->buddhist_students;
						
								$total_section += 1;
								$total_male += $item->male_students;
								$total_female += $item->female_students;
								$total_muslim += $muslim;
								$total_hindu += $item->hindu_students;
								$total_buddhist += $item->buddhist_students;
								$final_total += $total;
							@endphp
							<tr>
								<td class="align-middle">{{ AppHelper::en2bn($loop->iteration) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn_class($item->class_name) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn($item->class_section) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn($item->male_students) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn($item->female_students) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn($muslim) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn($item->hindu_students) }}</td>
								<td class="align-middle">{{ AppHelper::en2bn($item->buddhist_students) }}</td>
								<td class="align-middle" style="font-weight: bold;">{{ AppHelper::en2bn($total) }}</td>
							</tr>							
						@empty
							<tr>
								<td class="text-danger fw-bold" colspan="9">এই পর্যন্ত কোন ছাত্র যোগ করা হয়নি।</td>
							</tr>
						@endforelse
						</tbody>

						<tfoot>
							<tr>
								<th class="align-middle" colspan="2">{{ AppHelper::en2bn('মোট') }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($total_section) }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($total_male) }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($total_female) }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($total_muslim) }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($total_hindu) }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($total_buddhist) }}</th>
								<th class="align-middle">{{ AppHelper::en2bn($final_total) }}</th>
							</tr>							
						</tfoot>
					</table>
				</div>
			</div>


		</div>
	</section>