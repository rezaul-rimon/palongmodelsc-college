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

            <div class="col-md-6 col-12 add-button">
                <a style="margin-bottom: 20px;" type="button" class="btn btn-primary" href="{{ route('backend.add_stipend_students') }}">নতুন শ্রেণী যুক্ত করুন</a>
            </div>
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
            {{-- <colgroup>
                <col style="width: 5%;">
                <col style="width: 10%;">
                <col style="width: 35%;">
                <col style="width: 35%;">
                <col style="width: 15%;">
            </colgroup> --}}
            <thead>
                <tr>
                    <th class="align-middle" rowspan="2">ক্রম</th>
                    <th class="align-middle" rowspan="2">শ্রেণী</th>
                    <th class="align-middle" colspan="3">উপবৃত্তি</th>
                    <th class="align-middle" colspan="3">সরকারী বৃত্তি</th>
                    <th class="align-middle" rowspan="2">একশন</th>
                </tr>
                <tr>
                    <th class="align-middle">ছাত্র</th>
                    <th class="align-middle">ছাত্রী</th>
                    <th class="align-middle">মোট</th>
                    <th class="align-middle">ছাত্র</th>
                    <th class="align-middle">ছাত্রী</th>
                    <th class="align-middle">মোট</th>
                </tr>
            </thead>

            <tbody>
                {{-- @forelse($students as $item)
                    @php
                        $total = $item->male_students + $item->female_students;
                        $muslim = $total - $item->hindu_students - $item->buddhist_students;
                    @endphp
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->class_name }}</td>
                        <td class="align-middle">{{ $item->class_section }}</td>
                        <td class="align-middle">{{ $item->male_students }}</td>
                        <td class="align-middle">{{ $item->female_students }}</td>
                        <td class="align-middle">{{ $muslim }}</td>
                        <td class="align-middle">{{ $item->hindu_students }}</td>
                        <td class="align-middle">{{ $item->buddhist_students }}</td>
                        <td class="align-middle">{{ $total }}</td>
                        <td class="align-middle">{{ $item->user->name }}</td>
                        <td class="align-middle">
                            <a href="{{ route('backend.edit_students', $item->id) }}" class="btn my-1 btn-sm btn-warning">আপডেট</a>
                            <a href="{{ route('backend.delete_students', $item->id) }}" class="btn my-1 btn-sm btn-danger" onclick="return confirm('আপনি কি নিশ্চিত যে আপনি এই শ্রেণীটি ডিলিট করতে চান?')">ডিলিট</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="9">এই পর্যন্ত কোন ছাত্র যোগ করা হয়নি।</td>
                    </tr>
                @endforelse --}}
            </tbody>
        </table>
    </div>
</main>
@endsection



