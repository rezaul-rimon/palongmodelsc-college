@extends('frontend.layouts.front_app')

@section('content')

	@include('frontend.layouts.hero_single_page')

    <div class="container">
        <div class="row justify-content-center my-4">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class=""><span>ভর্তি</span> ফরম</h2>
                <p>অনলাইনে ভর্তি আবেদন করার জন্য ফরম টি পূরণ করে সাবমিট দিন।</p>
            </div>
        </div>
        
        <div class="admission-form col-md-8 offset-md-2">
            <form action="{{ route('frontend.admission_store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Your Name (In English)</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name_bn">আপনার নাম (বাংলাতে)</label>
                            <input type="text" class="form-control" id="name_bn" name="name_bn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fathers_name">Father's Name (In English)</label>
                            <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fathers_name_bn">পিতার নাম (বাংলাতে)</label>
                            <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mothers_name">Mother's Name (In English)</label>
                            <input type="text" class="form-control" id="mothers_name" name="mothers_name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mothers_name_bn">মাতার নাম (বাংলাতে)</label>
                            <input type="text" class="form-control" id="mothers_name_bn" name="mothers_name_bn">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="district">জেলা</label>
                            <input type="text" class="form-control" id="district" name="district" value="কক্সবাজার">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="upazila">উপজেলা</label>
                            <input type="text" class="form-control" id="upazila" name="upazila" value="উখিয়া">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="union">ইউনিয়ন</label>
                            <input type="text" class="form-control" id="union" name="union" value="রত্নাপালং">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ward">ওয়ার্ড</label>
                            <input type="text" class="form-control" id="ward" name="ward">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="post_office">পোস্ট অফিস</label>
                            <input type="text" class="form-control" id="post_office" name="post_office">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="post_code">পোস্ট কোড</label>
                            <input type="text" class="form-control" id="post_code" name="post_code">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="village">গ্রাম</label>
                            <input type="text" class="form-control" id="village" name="village">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="house">বাড়ী/রাস্তা/হোল্ডীং</label>
                            <input type="text" class="form-control" id="house" name="house">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_certificate">জন্ম নিবন্ধন নাম্বার</label>
                            <input type="text" class="form-control" id="birth_certificate" name="birth_certificate">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birth_certificate_file">জন্ম নিবন্ধন</label>
                            <input type="file" class="form-control" id="birth_certificate_file" name="birth_certificate_file">
                        </div>
                    </div>
                </div>




                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="button" class="form-control bg-warning" value="বাতিল করুন">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group bg-success">
                            <input type="submit" class="form-control" value="জমা দিন">
                        </div>
                    </div>
                </div>
                    
            </form>
        </div>

    </div>
    
    <div class="mt-5"></div>

@endsection

	

	