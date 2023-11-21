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
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ntrca.jpg') }}" alt="NTRCA" class="img-fluid">
                </div>
                <div class="img-title">বেসরকারী শিক্ষক নিবন্ধন ও প্রত্যয়ন কতৃপক্ষ</div>
            </a>
        </div>

        <!-- Repeat the same structure for other columns -->
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ctg-edu-board.png') }}" alt="Title 2" class="img-fluid">
                </div>
                <div class="img-title">মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষাবোর্ড চট্টগ্রাম</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/bteb.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ কারিগরি শিক্ষাবোর্ড</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/primary-board.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">প্রাথমিক শিক্ষা অধিদপ্তর</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/gov.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">শিক্ষা মন্ত্রনালয়</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/a2i.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">এ টু আই</div>
            </a>
        </div>

        {{-- সামরিক বাহিনী --}}
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/police.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ পুলিশ</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/tourist-police.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ ট্যুরিস্ট পুলিশ</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ctg-police.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">চট্টগ্রাম মেট্রোপলিট্রন পুলিশ</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/rab.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ র‍্যাব</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/cost-guard.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ কোস্ট গার্ড</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ansar.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ আনসার ও ভিডিপি</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/army.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ সেনাবাহিনী</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/air-force.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ বিমানবাহিনী</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/navy.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ নৌবাহিনী</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/bgb.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বর্ডার গার্ড বাংলাদেশ</div>
            </a>
        </div>

        {{-- স্বেচ্ছাসেবী --}}
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/fire-service.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ ফায়ার সার্ভিস</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/scout.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ স্কাউট</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/bncc.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ জাতীয় ক্যাডেট কোর</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/rcy.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">বাংলাদেশ রেড ক্রিসেন্ট</div>
            </a>
        </div>


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
