@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">গ্যালারী যুক্ত করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.store_gallery') }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="galleryTitle" class="text-info">গ্যালারী টাইটেল <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('galleryTitle') is-invalid @enderror" id="galleryTitle" name="galleryTitle" value="{{ old('galleryTitle') }}" required placeholder="উদাহরণঃ সবার জন্য কম্পিউটার প্রশিক্ষণ প্রোগ্রাম">
                            @error('galleryTitle')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="galleryPhotos" class="text-info">গ্যালারী ছবি <span class="text-danger">*</span> <span class="text-primary">(একাধিক ছবি সিলেক্ট করা যাবে)</span></label>
                            <input type="file" class="form-control @error('galleryPhotos') is-invalid @enderror" id="galleryPhotos" name="galleryPhotos[]" multiple>
                            @error('galleryPhotos')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.gallery') }}">ফিরে যান</a>
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

