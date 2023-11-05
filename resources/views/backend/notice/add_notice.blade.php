@extends('backend.layouts.back_app')

@section('content')

<div class="container">
    <div class="row">
        <div class="">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-primary my-4">নতুন নোটিশ যুক্ত করুন</h2>
    
                <div class="border p-4 rounded">
                    <form action="{{ route('backend.store_notice') }}" method="POST" id="notice" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="noticeType" class="text-info">নোটিশ টাইপ</label>
                            <input type="text" class="form-control @error('noticeType') is-invalid @enderror" id="noticeType" name="noticeType" value="{{ old('noticeType') }}" placeholder="উদাহরণঃ ভর্তি সংক্রান্ত / স্কুলছুটি সংক্রান্ত / পরীক্ষার ফলাফল" required>
                            @error('noticeType')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="noticeSummary" class="text-info">নোটিশ সারমর্ম</label>
                            <textarea class="form-control @error('noticeSummary') is-invalid @enderror" id="noticeSummary" name="noticeSummary" rows="4" placeholder="উদাহরণঃ কক্সবাজার জেলার উখিয়া উপজেলাধীন পালং আদর্শ উচ্চ বিদ্যালয়-এর ভারপ্রাপ্ত প্রধান শিক্ষকের আবেদনের প্রেক্ষিতে নিম্নোলিখিত পদে সরকারি বিধি মোতাবেক নিয়োগের জন্য অনুমতি দেয়া গেল।" required>{{ old('noticeSummary') }}</textarea>
                            @error('noticeSummary')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="noticeFile" class="text-info">নোটিশ ফাইল</label>
                            <input type="file" class="form-control @error('noticeFile') is-invalid @enderror" id="noticeFile" name="noticeFile" value="{{ old('noticeFile') }}" required>
                            @error('noticeFile')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a class="btn btn-warning form-control" href="{{ route('backend.notice') }}">ফিরে যান</a>
                                </div>
                            </div>
                            <div class="col-md-6">
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



