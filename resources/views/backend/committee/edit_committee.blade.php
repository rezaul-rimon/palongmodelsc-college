@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">সদস্যের তথ্য সংশোধন করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.update_committee', $committee->id) }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="committeeName" class="text-info">সদস্যের নাম <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('committeeName') is-invalid @enderror" id="committeeName" name="committeeName" value="{{ old('committeeName', $committee->committee_name) }}" required placeholder="উদাহরণঃ জনাব হোছাইন আলী মাতব্বর">
                            @error('committeeName')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="committeeDesignation" class="text-info">সদস্যের পদবী <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('committeeDesignation') is-invalid @enderror" id="committeeDesignation" name="committeeDesignation" value="{{ old('committeerDesignation', $committee->committee_designation) }}" required placeholder="উদাহরণঃ প্রতিষ্টাতা সভাপতি">
                            @error('committeeDesignation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="committeePhoto" class="text-info">সদস্যের ছবি <span class="text-primary">(ঐচ্ছিক)</span></label>
                            <input type="file" class="form-control @error('committeePhoto') is-invalid @enderror" id="committeePhoto" name="committeePhoto" value="{{ old('committeePhoto') }}">
                            @error('committeePhoto')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.committee') }}">ফিরে যান</a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="submit" value="আপডেট করুন" class="btn btn-success form-control">
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

