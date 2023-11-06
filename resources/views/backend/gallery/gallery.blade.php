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
                <h1 class="text-danger">গ্যালারী ম্যানেজমেন্ট</h1>
            </div>

            <div class="col-md-6 col-12 add-button">
                <a style="margin-bottom: 20px;" class="btn btn-primary" href="{{ route('backend.add_gallery') }}">নতুন গ্যালারী ছবি যুক্ত করুন</a>
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
                <col style="width: 5%;">
                <col style="width: 15%;">
                <col style="width: 25%;">
                <col style="width: 30%;">
                <col style="width: 15%;">
                <col style="width: 5%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>যুক্তকরণ সময়</th>
                    <th>গ্যালারী হেডীং</th>
                    <th>ছবি সমূহ</th>
                    <th>গ্যালারী যুক্তকারী</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($gallery as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="align-middle">{{ $item->gallery_title }}</td>
                        <td class="align-middle">
                            @if($item->image_paths)
                                @php
                                    $imagePaths = json_decode($item->image_paths);
                                @endphp
                                @if(is_array($imagePaths))
                                    @foreach($imagePaths as $imagePath)
                                        <img src="{{ asset('Resources/Gallery/Photos/' . $imagePath) }}" alt="{{ $item->gallery_title }} Photo" style="max-width: 100px; height: 80px;">
                                    @endforeach
                                @endif
                            @endif
                        </td>
                        <td class="align-middle">{{ $item->user->name }}</td>
                        <td class="align-middle">
                            {{-- <a href="#" class="btn my-1 btn-sm btn-warning">Edit</a> --}}
                            <a href="#" class="btn my-1 btn-sm btn-danger" onclick="showConfirmationModal({{ $item->id }})"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="6">এই পর্যন্ত কোন গ্যালারী যুক্ত করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody>            
            
            <script>
                function showConfirmationModal(itemId) {
                    if (confirm('আপনি কি নিশ্চিত যে আপনি এই গ্যালারীটি ডিলিট করতে চান?')) {
                        // If the user confirms, redirect to the delete route
                        window.location.href = "{{ route('backend.delete_gallery', '') }}" + '/' + itemId;
                    }
                }
            </script>
        </table>
    </div>
</main>
@endsection


