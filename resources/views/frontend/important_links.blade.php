@extends('frontend.layouts.front_app')

@section('content')
@include('frontend.layouts.hero_single_page')

<style>
    .link-img {
        width: 100%;
        height: 150px;
        overflow: hidden;
        display: flex; /* Use flexbox layout */
        flex-direction: column; /* Align items in a column */
        justify-content: center; /* Center items vertically */
    }

    .link-img img {
        width: auto;
        height: 100%;
        object-fit: fit;
        transition: transform 0.3s;
        margin: 0 auto; /* Center the image horizontally */
    }

    .custom-col {
        padding-right: 0;
        padding-left: 0;
        margin-bottom: 30px;
    }

    .custom-col:hover .link-img img {
        transform: scale(1.1);
    }

    .img-title {
        text-align: center; /* Center the text horizontally */
        color: black;
        margin-top: 8px;
        text-decoration: none;
        font-size: 16px;
        line-height: 18px;
        /* font-weight: bold; */
    }
</style>

<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>কুইক</span> লিংক</h2>
        </div>
    </div>

    <div class="row">
        @forelse ($quick_links as $item)
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="{{ $item->site_link }}" target="_blank">
                <div class="link-img">
                    @if($item->site_logo != null)
                        <img src="{{ asset('storage/Resources/QuickLink/Photos/' . $item->site_logo) }}" alt="{{ $item->site_name }} Photo" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/Resources/QuickLink/Photos/default.png') }}" alt="{{ $item->site_name }} Photo" class="img-fluid">
                    @endif

                </div>
                <div class="img-title">{{ $item->site_name }}</div>
            </a>
        </div>
        @empty
        <h2 class="text-secondary font-bold mb-2" style="text-align: center;">আমাদের প্ল্যানে আপাতত কোন আপকামিং ইভেন্ট নেই, কোন ইভেন্টের প্ল্যান হওইয়া মাত্রই জানিয়ে দেয়া হবে। </h2>
        @endforelse

        {{-- <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ntrca.jpg') }}" alt="NTRCA" class="img-fluid">
                </div>
                <div class="img-title">বেসরকারী শিক্ষক নিবন্ধন ও প্রত্যয়ন কতৃপক্ষ</div>
            </a>
        </div> --}}
        


        <!-- Repeat for other columns -->

    </div>
</div>

{{-- হট লাইন --}}
<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4"><span>হট</span> লাইন</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-sm-4 custom-col">
            <div class="link-img">
                <img src="{{ asset('frontend/images/333.png') }}" alt="NTRCA" class="img-fluid">
            </div>
        </div>

        <!-- Repeat the same structure for other columns -->
        <div class="col-md-2 col-sm-4 custom-col">
            <div class="link-img">
                <img src="{{ asset('frontend/images/999.jpg') }}" alt="Title 2" class="img-fluid">
            </div>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <div class="link-img">
                <img src="{{ asset('frontend/images/109.png') }}" alt="Title 3" class="img-fluid">
            </div>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <div class="link-img">
                <img src="{{ asset('frontend/images/1090.png') }}" alt="Title 3" class="img-fluid">
            </div>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <div class="link-img">
                <img src="{{ asset('frontend/images/106.png') }}" alt="Title 3" class="img-fluid">
            </div>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <div class="link-img">
                <img src="{{ asset('frontend/images/vumi-seba.png') }}" alt="Title 3" class="img-fluid">
            </div>
        </div>


        <!-- Repeat for other columns -->

    </div>
</div>

@include('frontend.layouts.map_and_contact_form')
<div class="mt-5"></div>

@endsection
