@extends('frontend.layouts.front_app')

@section('content')

	@include('frontend.layouts.hero_single_page')

    {{-- @include('frontend.layouts.hero_highlights') --}}
	@include('frontend.layouts.featured_highlights')
	@include('frontend.layouts.speech')
    @include('frontend.layouts.special_highlight')
    @include('frontend.layouts.managing_board')
    @include('frontend.layouts.achivements')
    @include('frontend.layouts.testimonials')
    @include('frontend.layouts.map_and_contact_form')
    
    <div class="mt-5"></div>

@endsection
