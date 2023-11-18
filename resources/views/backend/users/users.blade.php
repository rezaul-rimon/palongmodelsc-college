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
                <h1 class="text-danger">ইউজার ম্যানেজমেন্ট</h1>
            </div>

            {{-- <div class="col-md-6 col-12 add-button">
                <a style="margin-bottom: 20px;" class="btn btn-primary" href="{{ route('backend.add_teacher') }}">নতুন শিক্ষক যুক্ত করুন</a>
            </div> --}}
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
                <col style="width: 10%;">
                <col style="width: 15%;">
                <col style="width: 20%;">
                <col style="width: 20%;">
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 15%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>তারিখ ও সময়</th>
                    <th>নাম</th>
                    <th>ইমেইল</th>
                    <th>পারমিশন</th>
                    <th>রোল</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="align-middle">
                            {{ $item->name }}
                            @if($item->id == auth()->user()->id)
                                <span class="text-primary">(You)</span>
                            @else
                            @endif
                        </td>                        
                        <td class="align-middle">{{ $item->email }}</td>
                        <td class="align-middle">
                            @if($item->permission == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td class="align-middle">
                            @if($item->role == 1)
                                Admin
                            @elseif($item->role == 2)
                                Super Admin
                            @else
                                People
                            @endif
                        </td>                        
                        <td class="align-middle">
                            <a href="{{ route('backend.edit_user', $item->id) }}" class="btn my-1 btn-sm btn-warning">আপডেট</a>
                            <a href="{{ route('backend.delete_user', $item->id) }}" class="btn my-1 btn-sm btn-danger" onclick="return confirm('আপনি কি নিশ্চিত যে আপনি এই শিক্ষককে ডিলিট করতে চান?')">ডিলিট</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="8">এই পর্যন্ত কোন ইউজার সংযুক্ত করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody>   
        </table>
    </div>
</main>
@endsection


