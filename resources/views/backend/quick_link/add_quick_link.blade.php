@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">নতুন লিংক যুক্ত করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.store_quick_link') }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="siteName" class="text-info">সাইটের নাম</label>
                            <input type="text" class="form-control @error('siteName') is-invalid @enderror" id="siteName" name="siteName" value="{{ old('siteName') }}" placeholder="উদাহরণঃ শিক্ষা মন্ত্রনালয় / মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষাবোর্ড" required>
                            @error('siteName')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="siteLink" class="text-info">সাইটের লিংক</label>
                            <textarea class="form-control @error('siteLink') is-invalid @enderror" id="siteLink" name="siteLink" rows="4" placeholder="উদাহরণঃ https://web.bise-ctg.gov.bd/bisectg" required>{{ old('siteLink') }}</textarea>
                            @error('siteLink')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="siteLogo" class="text-info">সাইটের লোগো</label>
                            <input type="file" class="form-control @error('siteLogo') is-invalid @enderror" id="siteLogo" name="siteLogo" value="{{ old('siteLogo') }}">
                            @error('siteLogo')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.quick_link') }}">ফিরে যান</a>
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



