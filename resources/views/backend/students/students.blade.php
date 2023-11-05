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

            <div class="col-md-6 col-12 add-button">
                {{-- <a style="margin-bottom: 20px;" class="btn btn-primary" href="">নতুন নোটিশ যুক্ত করুন</a> --}}
                {{-- <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#classAddModal">
                    নতুন শ্রেণী যুক্ত করুন
                </button> --}}
                <a style="margin-bottom: 20px;" type="button" class="btn btn-primary" href="{{ route('backend.add_students') }}">নতুন শ্রেণী যুক্ত করুন</a>
            </div>
        </div>

        <div class="col-md-6 offset-md-3">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <script>
            $(document).ready(function() {
                $('.alert').delay(2000).fadeOut(500);
            });
        </script>               

        <table class="table table-responsive table-bordered text-center">
            <colgroup>
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
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

            <tbody>
                @forelse($students as $item)
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
                        {{-- <td class="align-middle">{{ $item->user->name }}</td> --}}
                        <td class="align-middle">
                            <a href="{{ route('backend.edit_students', $item->id) }}" class="btn my-1 btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn my-1 btn-sm btn-danger" onclick="showConfirmationModal({{ $item->id }})">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="9">এই পর্যন্ত কোন ছাত্র যোগ করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody>            

            <script>
                function showConfirmationModal(itemId) {
                    if (confirm('আপনি কি নিশ্চিত যে আপনি এই শ্রেণীটি ডিলিট করতে চান?')) {
                        // If the user confirms, redirect to the delete route
                        window.location.href = "{{ route('backend.delete_students', '') }}" + '/' + itemId;
                    }
                }
            </script>
        </table>
    </div>
</main>
@endsection



