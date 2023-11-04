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
                <h1 class="text-danger">অনুমোদিত ম্যানেজিং কমিটি ম্যানেজমেন্ট</h1>
            </div>

            <div class="col-md-6 col-12 add-button">
                {{-- <a style="margin-bottom: 20px;" class="btn btn-primary" href="">নতুন নোটিশ যুক্ত করুন</a> --}}
                <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#memberAddModal">
                    নতুন সদস্য যুক্ত করুন
                </button>
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
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 15%;">
                <col style="width: 10%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>তারিখ ও সময়</th>
                    <th>ছবি</th>
                    <th>সদস্যের নাম</th>
                    <th>সদস্যের পদবী</th>
                    <th>সদস্য যুক্তকারী</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($committee as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->updated_at }}</td>
                        <td class="align-middle">
                            @if($item->committee_photo != null)
                                <img src="{{ asset('Resources/Committee/Photos/' . $item->committee_photo) }}" alt="{{ $item->committee_name }} Photo" style="max-width: 60px; height: 60px;">
                            @else
                                <img src="{{ asset('Resources/Committee/Photos/committee.png') }}" alt="{{ $item->committee_name }} Photo" style="max-width: 60px; height: 60px;">
                            @endif
                        </td>                        
                        <td class="align-middle">{{ $item->committee_name }}</td>
                        <td class="align-middle">{{ $item->committee_designation }}</td>
                        <td class="align-middle">{{ $item->user->name }}</td>
                        <td class="align-middle">
                            <a href="#" class="btn my-1 btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn my-1 btn-sm btn-danger" onclick="showConfirmationModal({{ $item->id }})">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-danger fw-bold" colspan="8">এই পর্যন্ত কোন কমিটি সদস্য সংযুক্ত করা হয়নি।</td>
                    </tr>
                @endforelse
            </tbody>
            
            <script>
                function showConfirmationModal(itemId) {
                    if (confirm('আপনি কি নিশ্চিত যে আপনি এই কমিটি সদস্যকে ডিলিট করতে চান?')) {
                        // If the user confirms, redirect to the delete route
                        window.location.href = "{{ route('backend.delete_committee', '') }}" + '/' + itemId;
                    }
                }
            </script>
        </table>
    </div>
</main>
@endsection

<!-- Add Modal -->
<div class="modal fade" id="memberAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="staticBackdropLabel">নতুন কমিটি সদস্য যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.add_committee') }}" method="POST" id="notice" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group mb-4">
                        <label for="committeeName" class="text-info">সদস্যের নাম</label>
                        <input type="text" class="form-control @error('committeeName') is-invalid @enderror" id="committeeName" name="committeeName" value="{{ old('committeeName') }}" required>
                        @error('committeeName')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group mb-4">
                        <label for="committeeDesignation" class="text-info">সদস্যের পদবী</label>
                        <input type="text" class="form-control @error('committeeDesignation') is-invalid @enderror" id="committeeDesignation" name="committeeDesignation" value="{{ old('committeerDesignation') }}" required>
                        @error('committeeDesignation')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="committeePhoto" class="text-info">সদস্যের ছবি</label>
                        <input type="file" class="form-control @error('committeePhoto') is-invalid @enderror" id="committeePhoto" name="committeePhoto" value="{{ old('committeePhoto') }}">
                        @error('committeePhoto')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">বাতিল করুন</button>
                        <input type="submit" value="যুক্ত করুন" class="btn btn-success">
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>


