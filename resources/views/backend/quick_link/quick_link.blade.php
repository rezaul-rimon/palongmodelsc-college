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
                <h1 class="text-danger">কুইক লিংক ম্যানেজমেন্ট</h1>
            </div>

            @if(auth()->user()->role == 1 or auth()->user()->role == 2)
            <div class="col-md-6 col-12 add-button">
                <a style="margin-bottom: 20px;" class="btn btn-primary" href="{{ route('backend.add_quick_link') }}">নতুন লিংক যুক্ত করুন</a>
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
                <col style="width: 5%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 20%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>তারিখ ও সময়</th>
                    <th>লোগো</th>
                    <th>সাইটের নাম</th>
                    <th>সাইটের লিংক</th>
                    <th>সাইট যুক্তকারী</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($quick_links as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->updated_at }}</td>
                        <td class="align-middle">
                            @if($item->site_logo != null)
                                <img src="{{ asset('storage/Resources/QuickLink/Photos/' . $item->site_logo) }}" alt="{{ $item->site_name }} Photo" style="max-width: 120px; height: 80px;">
                            @else
                                <img src="{{ asset('storage/Resources/QuickLink/Photos/default.png') }}" alt="{{ $item->site_name }} Photo" style="max-width: 120px; height: 80px;">
                            @endif
                        </td>                        
                        <td class="align-middle">{{ $item->site_name }}</td>
                        <td class="align-middle">{{ $item->site_link }}</td>
                        <td class="align-middle">{{ $item->user->name }}</td>
                        <td class="align-middle">
                            @if(auth()->user()->role == 1 or auth()->user()->role == 2)
                            <a href="{{ route('backend.edit_quick_link', $item->id) }}" class="btn my-1 btn-sm btn-warning">সংশোধন</a>
                            <a href="{{ route('backend.delete_quick_link', $item->id) }}" class="btn my-1 btn-sm btn-danger" onclick="confirm('আপনি কি নিশ্চিত যে আপনি এই কুইক লিংকটি ডিলিট করতে চান?')">ডিলিট</a>
                            @else
                            <span class="text-danger">শুধুমাত্র এডমিন একশন নিতে পারে</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="7">এই পর্যন্ত কোন কুইক লিংক সংযুক্ত করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody> 
        </table>
    </div>
</main>
@endsection


