@extends('frontend.layouts.front_app')

@section('content')

@php
use App\Helpers\AppHelper;
@endphp

@include('frontend.layouts.hero_single_page')

<section class="ftco-gallery">
    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
        }

        .hover-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(00, 101, 162, 0.3); /* Adjust the background color and opacity as needed */
            color: #fff; /* Adjust the text color as needed */
            display: none;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 40px;
        }

        .gallery-item:hover .hover-content {
            display: flex;
        }
    </style>

    <div class="container-wrap">
        <div class="row justify-content-center mt-5 pb-1">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4"><span>ফটো</span> গ্যালারী</h2>
                <p>আমাদের স্কুল ও কলেজের সদ্য অনুষ্টিত সকল ইভেন্ট এর ছবি এইখানে হালনাগাদ রাখা হয়</p>
            </div>
        </div>
        <div class="row no-gutters">
            @forelse ($galleryItems as $item)
                <div class="col-12 text-center text-primary mt-5">
                    <p style="font-size: 20px;">{{ $item->gallery_title }}</p>
                    <p style="margin-top:-25px; color:black;">তারিখঃ {{ AppHelper::en2bn($item->created_at->format('d-m-Y')) }}</p>
                </div>
                @foreach ($item->image_paths as $image)
                    <div class="col-md-3 ftco-animate">
                        <div class="gallery-item">
                            <div class="gallery image-popup img d-flex align-items-center"
                                style="background-image: url({{ asset('storage/Resources/Gallery/Photos/' . $image) }});">
                                <div class="hover-content">
                                    <span>{{ $item->gallery_title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                <div class="col-12 text-center text-danger mt-5">
                    <p style="font-size: 20px;">No gallery items available</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<div class="mt-5"></div>

@endsection
