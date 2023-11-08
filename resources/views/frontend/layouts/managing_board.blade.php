<section class="ftco-section ftco-no-pb">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>অনুমোদিত</span> ম্যানেজিং কমিটি</h2>
					<p>৩০ মার্চ ২০২৩ ইং তারিখে উল্লেখিত, <strong>স্মারক নংঃ- চশিবো/বিদ্যা/কক্স(উখিয়া)/৭৩/৭৮/(অশ-১)/২৭৭৯(২);</strong> মোতাবেক, <br>উপর্যুক্ত বিষয়ে নির্দেশক্রমে জানানো যাচ্ছে যে, উক্ত বিদ্যালয়ের দৈনন্দিন প্রশাসনিক কার্যাবলি পরিচালনার জন্য মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষাবোর্ড, চট্টগ্রাম এর প্রবিধানমালা ২০০৯ এর প্রবিধান ৭ ও ৮ আনুসারে গঠিত কমিটিকে প্রথম সভার তারিখ হতে ০২ (দুই) বছরের জন্য অনুমোদন দেয়া হলো। <br><strong>-মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষাবোর্ড, চট্টগ্রাম</strong></p>
				</div>
			</div>

			<div class="row">
				<table class="table table-striped table-bordered text-center" style="font-size: 20px;">
					<thead >
						<tr>
							<th style="width: 8%">ক্রম</th>
							<th style="width: 10%">সদস্যের ছবি</th>
							<th style="width: 41%">সদস্যের নাম</th>
							<th style="width: 41%">সদস্যের পদবী</th>
						</tr>
					</thead>

					<tbody>
						@forelse ($committee as $item)
							<tr>
								<td class="align-middle">{{ $loop->iteration }}</td>
								<td class="align-middle">
									@if($item->committee_photo != null)
										<img src="{{ asset('Resources/Committee/Photos/' . $item->committee_photo) }}" alt="{{ $item->committee_name }} Photo" style="max-width: 80px; height: 80px;">
									@else
										<img src="{{ asset('Resources/Committee/Photos/committee.png') }}" alt="{{ $item->committee_name }} Photo" style="max-width: 80px; height: 80px;">
									@endif
								</td>
								<td class="align-middle">{{ $item->committee_name }}</td>
								<td class="align-middle">{{ $item->committee_designation }}</td>
							</tr>
						@empty
							
						@endforelse
					</tbody>

					{{-- <tbody>
						<tr>
							<td>১</td>
							<td>জনাব জালাল আহমদ</td>
							<td>সভাপতি</td>
						</tr>
						<tr>
							<td>২</td>
							<td>জনাব আকবর আহমদ চৌধুরী</td>
							<td>দাতা সদস্য</td>
						</tr>
						<tr>
							<td>৩</td>
							<td>প্রধান শিক্ষক/শিক্ষিকা (পদাধিকার বলে)</td>
							<td>সম্পাদক / সদস্য সচিব</td>
						</tr>
						<tr>
							<td>৪</td>
							<td>জনাব আব্দুল লতিফ হেলাল</td>
							<td>(অভিভাবক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>৫</td>
							<td>জনাব ফারুখ আহমদ</td>
							<td>(অভিভাবক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>৬</td>
							<td>জনাব মুজিবুল হক চৌধুরী</td>
							<td>(অভিভাবক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>৭</td>
							<td>জনাব লুতফর রহমান</td>
							<td>(অভিভাবক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>৮</td>
							<td>জনাব রাশেদা বেগম</td>
							<td>(সংরক্ষিত মহিলা অভিভাবক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>৯</td>
							<td>জনাব কবির আহমদ</td>
							<td>(শিক্ষক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>১০</td>
							<td>জনাব মোঃ কায়সার উদ্দিন</td>
							<td>(শিক্ষক প্রতিনিধি) / সদস্য</td>
						</tr>
						<tr>
							<td>১১</td>
							<td>জনাব খুরশিদা বেগম</td>
							<td>(সংরক্ষিত মহিলা শিক্ষক প্রতিনিধি) / সদস্য</td>
						</tr>
					</tbody> --}}

					<tfoot>

					</tfoot>
				</table>
			</div>

		</div>
	</section>