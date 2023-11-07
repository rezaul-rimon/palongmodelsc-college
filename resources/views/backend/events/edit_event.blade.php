@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">ইভেন্ট সংশোধন করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.update_event', $event->id) }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="eventName" class="text-info">ইভেন্টের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('eventName') is-invalid @enderror" id="eventName" name="eventName" value="{{ old('eventName', $event->event_name) }}" required>
                            @error('eventName')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="eventDate" class="text-info">ইভেন্টের তারিখ <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('eventDate') is-invalid @enderror" id="eventDate" name="eventDate" value="{{ old('eventDate', $event->event_date) }}" required>
                            @error('eventDate')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="eventDescription" class="text-info">ইভেন্টের বিস্তারিত <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('eventDescription') is-invalid @enderror" id="eventDescription" name="eventDescription" required rows="4">{{ old('eventDescription', $event->event_description) }}</textarea>
                            @error('eventDescription')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>                    
                    
                        <div class="form-group mb-4">
                            <label for="eventPhoto" class="text-info">ইভেন্টের ছবি <span class="text-primary">(ঐচ্ছিক)</span></label>
                            <input type="file" class="form-control @error('eventPhoto') is-invalid @enderror" id="eventPhoto" name="eventPhoto" value="{{ old('eventPhoto') }}">
                            @error('eventPhoto')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.event') }}">ফিরে যান</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="submit" value="যুক্ত করুন" class="btn btn-success form-control">
                                </div>
                            </div>
                        </div>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

            
@endsection

