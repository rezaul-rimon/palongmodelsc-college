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
                <h1 class="text-danger">শ্রেণী ভিত্তিক ছাত্র-ছাত্রী ম্যানেজমেন্ট</h1>
            </div>

            @if(auth()->user()->role == 1 or auth()->user()->role == 2)
            <div class="col-md-6 col-12 add-button">
                <a style="margin-bottom: 20px;" type="button" class="btn btn-primary" href="{{ route('backend.add_students') }}">নতুন শ্রেণী যুক্ত করুন</a>
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
            <colgroup>
                <col style="width: 6%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 14%;">
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
                    <th>একশন</th>
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
                    <td class="align-middle">{{ AppHelper::en2bn($total) }}</td>
                    <td class="align-middle">
                        @if(auth()->user()->role == 1 or auth()->user()->role == 2)
                        <a href="{{ route('backend.edit_students', $item->id) }}" class="btn my-1 btn-sm btn-warning">আপডেট</a>
                        <a href="{{ route('backend.delete_students', $item->id) }}" class="btn my-1 btn-sm btn-danger" onclick="return confirm('আপনি কি নিশ্চিত যে আপনি এই শ্রেণীটি ডিলিট করতে চান?')">ডিলিট</a>
                        @else
                            <span class="text-danger">শুধুমাত্র এডমিন একশন নিতে পারে</span>
                        @endif
                    </td>
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
                    <th></th>
                </tr>							
            </tfoot>            
        </table>
    </div>
</main>
@endsection



