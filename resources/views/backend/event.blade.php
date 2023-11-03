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
                <h1 class="text-danger">ইভেন্ট ম্যানেজমেন্ট</h1>
            </div>

            <div class="col-md-6 col-12 add-button">
                {{-- <a style="margin-bottom: 20px;" class="btn btn-primary" href="">নতুন নোটিশ যুক্ত করুন</a> --}}
                <button style="margin-bottom: 20px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventAddModal">
                    নতুন আপকামিং ইভেন্ট যুক্ত করুন
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
                <col style="width: 10%;">
                <col style="width: 10%;">
                <col style="width: 20%;">
                <col style="width: 25%;">
                <col style="width: 10%;">
                <col style="width: 12%;">
                <col style="width: 8%;">
            </colgroup>
            <thead>
                <tr>
                    <th>ক্রম</th>
                    <th>যুক্তকরণ সময়</th>
                    <th>ছবি</th>
                    <th>ইভেন্টের নাম</th>
                    <th>ইভেন্টের বিস্তারিত</th>
                    <th>ইভেন্টের তারিখ</th>
                    <th>ইভেন্ট যুক্তকারী</th>
                    <th>একশন</th>
                </tr>
            </thead>

            <tbody>
                @forelse($event as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="align-middle">
                            @if($item->event_photo != null)
                                <img src="{{ asset('Resources/Event/Photos/' . $item->event_photo) }}" alt="{{ $item->event_name }} Photo" style="max-width: 60px; height: 60px;">
                            @else
                                <img src="{{ asset('Resources/Event/Photos/event.jpg') }}" alt="{{ $item->event_name }} Photo" style="max-width: 60px; height: 60px;">
                            @endif
                        </td>                        
                        <td class="align-middle">{{ $item->event_name }}</td>
                        <td class="align-middle">{{ $item->committee_description }}</td>
                        <td class="align-middle">{{ $item->event_date }}</td>
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
                    if (confirm('আপনি কি নিশ্চিত যে আপনি এই ইভেন্টটি ডিলিট করতে চান?')) {
                        // If the user confirms, redirect to the delete route
                        window.location.href = "{{ route('backend.delete_event', '') }}" + '/' + itemId;
                    }
                }
            </script>
        </table>
    </div>
</main>
@endsection

<!-- Modal -->
<div class="modal fade" id="eventAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">নতুন আপকামিং ইভেন্ট যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('backend.add_event') }}" method="POST" id="notice" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group mb-4">
                        <label for="eventName">ইভেন্টের নাম</label>
                        <input type="text" class="form-control @error('eventName') is-invalid @enderror" id="eventName" name="eventName" value="{{ old('eventName') }}" required>
                        @error('eventName')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="eventDate">ইভেন্টের তারিখ</label>
                        <input type="date" class="form-control @error('eventDate') is-invalid @enderror" id="eventDate" name="eventDate" value="{{ old('eventDate') }}" required>
                        @error('eventDate')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group mb-4">
                        <label for="eventDescription">ইভেন্টের বিস্তারিত</label>
                        <textarea class="form-control @error('eventDescription') is-invalid @enderror" id="eventDescription" name="eventDescription" required>{{ old('eventDescription') }}</textarea>
                        @error('eventDescription')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>                    
                
                    <div class="form-group">
                        <label for="eventPhoto">ইভেন্টের ছবি</label>
                        <input type="file" class="form-control @error('eventPhoto') is-invalid @enderror" id="eventPhoto" name="eventPhoto" value="{{ old('eventPhoto') }}">
                        @error('eventPhoto')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add a Notice" class="btn btn-success">
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>

