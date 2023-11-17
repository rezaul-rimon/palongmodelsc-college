@extends('frontend.layouts.front_app')

@section('content')

	@include('frontend.layouts.hero_single_page')

    {{-- @include('frontend.layouts.hero_highlights') --}}
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-2">আমাদের ঠিকানাঃ</h3>
                        <p>রত্নাপালং, কোটবাজার-৪৭৫০, টেকনাফ হাইওয়ে, উখিয়া, কক্সবাজার</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-2">যোগাযোগ এর নাম্বার</h3>
                        <p><a href="#">+ 1235 2355 98</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-2">ইমেইলঃ</h3>
                        <p><a href="#"></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-2">হোয়াটস এপ</h3>
                        <p><a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <div class="col-md-6 offset-md-3">
            @if (session()->has('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <script>
            $(document).ready(function() {
                $('.alert').delay(15000).fadeOut(500);
            });
        </script> 
    
        @include('frontend.layouts.map_and_contact_form')
    
    <div class="mt-5"></div>

@endsection
