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
        margin-bottom: 20px;
    }

    .custom-col:hover .link-img img {
        transform: scale(1.1);
    }

    .img-title {
        text-align: center; /* Center the text horizontally */
        color: black;
        margin-top: 0px;
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
    }
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ntrca.jpg') }}" alt="NTRCA" class="img-fluid">
                </div>
                <div class="img-title">NTRCA</div>
            </a>
        </div>

        <!-- Repeat the same structure for other columns -->
        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/ctg-edu-board.png') }}" alt="Title 2" class="img-fluid">
                </div>
                <div class="img-title">Title 2</div>
            </a>
        </div>

        <div class="col-md-2 col-sm-4 custom-col">
            <a href="#">
                <div class="link-img">
                    <img src="{{ asset('frontend/images/bteb.png') }}" alt="Title 3" class="img-fluid">
                </div>
                <div class="img-title">Title 3</div>
            </a>
        </div>

        <!-- Repeat for other columns -->

    </div>
</div>

@include('frontend.layouts.map_and_contact_form')
<div class="mt-5"></div>

@endsection
