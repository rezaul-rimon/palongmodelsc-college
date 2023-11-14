@extends('backend.layouts.back_app')

@section('content')


<style>
    .page-title {
        text-align: left;
        margin: 20px 0 10px 0;
    }

    .add-button {
        text-align: right;
        margin: 20px 0 10px 0;
    }

    @media (max-width: 768px) {
        .page-title {
            text-align: center;
            margin: 20px 0 10px 0;
        }

        .add-button {
            text-align: center;
            margin: 0 0 10px 0;
        }
    }

</style>


<main>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6 col-12 page-title">
                <h1 class="text-danger">বৃত্তিপ্রাপ্ত ছাত্র-ছাত্রী ম্যানেজমেন্ট</h1>
            </div>

            @if(auth()->user()->role === 1 or auth()->user()->role === 2)
            <div class="col-md-6 col-12 add-button">
                <a style="margin-bottom: 20px;" type="button" class="btn btn-primary" href="{{ route('backend.add_stipend_students') }}">নতুন শ্রেণী যুক্ত করুন</a>
            </div>
            @endif
        </div>

        <div class="col-md-6 offset-md-3">
            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <script>
            $(document).ready(function() {
                $('.alert').delay(4000).fadeOut(500);
            });
        </script>               

        <table class="table table-responsive table-bordered text-center">
            <thead>
                <tr>
                    <th class="align-middle" rowspan="2" style="width: 5%;">ক্রম</th>
                    <th class="align-middle" rowspan="2" style="width: 10%;">শ্রেণী</th>
                    <th class="align-middle" colspan="3" style="width: 35%;">উপবৃত্তি</th>
                    <th class="align-middle" colspan="3" style="width: 35%;">সরকারী বৃত্তি</th>
                    <th class="align-middle" rowspan="2" style="width: 15%;">একশন</th>
                </tr>
                <tr>
                    <th class="align-middle" style="width: 12%;">ছাত্র</th>
                    <th class="align-middle" style="width: 12%;">ছাত্রী</th>
                    <th class="align-middle" style="width: 11%;">মোট</th>
                    <th class="align-middle" style="width: 12%;">ছাত্র</th>
                    <th class="align-middle" style="width: 12%;">ছাত্রী</th>
                    <th class="align-middle text-bold" style="width: 11%;">মোট</th>
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
                @forelse($students as $item)
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
                        <td class="align-middle">
                            @if(auth()->user()->role === 1 or auth()->user()->role === 2)
                            <a href="{{ route('backend.edit_stipend_students', $item->id) }}" class="btn my-1 btn-sm btn-warning">আপডেট</a>
                            <a href="{{ route('backend.delete_stipend_students', $item->id) }}" class="btn my-1 btn-sm btn-danger" onclick="return confirm('আপনি কি নিশ্চিত যে আপনি এই শ্রেণীটি ডিলিট করতে চান?')">ডিলিট</a>
                            @else
                                <span class="text-danger">শুধুমাত্র এডমিন একশন নিতে পারে</span>
                            @endif
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="9">এই পর্যন্ত কোন বৃত্তিপ্রাপ্ত শ্রেণী যুক্ত করা হয়নি।</td>
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
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</main>
@endsection



