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

        <style>
            label{
                /* color: #fd7e14;*/
                color: #343a40;
            }

        </style>
        
        <div class="admission-form col-md-8 offset-md-2">
            <form action="{{ route('frontend.admission_store') }}" method="POST">
                @csrf
                
                {{-- Personal Information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">ব্যাক্তিগত তথ্যঃ</div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_bn">নাম (বাংলাতে)</label>
                                <input type="text" class="form-control" id="name_bn" name="name_bn">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name (In English)</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">লিঙ্গ</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="male">পুরুষ</option>
                                    <option value="female">মহিলা</option>
                                    <option value="other">অন্যান্য</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">জাতীয়তা</label>
                                <select class="form-control" id="nationality" name="nationality">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="bangladeshi">বাঙ্গলাদেশী</option>
                                    <option value="chakma">চাকমা</option>
                                    <option value="marma">মারমা</option>
                                    <option value="rohingya">রাখাইন</option>
                                    <option value="other">অন্যান্য</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">ধর্ম</label>
                                <select class="form-control" id="religion" name="religion">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="muslim">মুসলিম</option>
                                    <option value="hindu">হিন্দু</option>
                                    <option value="buddhist">বৌদ্ধ</option>
                                    <option value="christian">খ্রীষ্ঠান</option>
                                    <option value="other">অন্যান্য</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">জন্ম তারিখ</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birth_certificate_no">জন্ম নিবন্ধন নাম্বার</label>
                                <input type="text" class="form-control" id="birth_certificate_no" name="birth_certificate_no">
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birth_certificate_file">জন্ম নিবন্ধন</label>
                                <input type="file" class="form-control" id="birth_certificate_file" name="birth_certificate_file">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Fathers and Mothers information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">পিতা মাতার তথ্যঃ</div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">পিতার নাম (বাংলাতে)</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">Father's Name (In English)</label>
                                <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">পিতার পেশা</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">পিতার বর্তমান অবস্থান</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">পিতার বার্ষিক আয়</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">পিতার সম্পত্তির পরিমান</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
    
                    </div> 
                    <div class="col-12"><hr><hr></div>
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_name_bn">মাতার নাম (বাংলাতে)</label>
                                <input type="text" class="form-control" id="mothers_name_bn" name="mothers_name_bn">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_name">Mother's Name (In English)</label>
                                <input type="text" class="form-control" id="mothers_name" name="mothers_name">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">মাতার পেশা</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">মাতার বর্তমান অবস্থান</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">মাতার বার্ষিক আয়</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">মাতার সম্পত্তির পরিমান</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Guirdians Information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">অভিভাবকের তথ্যঃ</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">অভিভাবকের নামঃ</label>
                                <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">অভিভাবকের সাথে সম্পর্ক</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">অভিভাবকের ঠিকানা</label>
                                <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">অভিভাবকের মোবাইল নাম্বার</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Guirdiand in Law Information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">আইনত অভিভাবকের তথ্যঃ <br> <p style="font-size: 16px; color: black; margin-top: -10px;">(পিতা মাতা জীবিত না থাকলে)</p></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">অভিভাবকের নামঃ</label>
                                <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">অভিভাবকের সাথে সম্পর্ক</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">অভিভাবকের ঠিকানা</label>
                                <input type="text" class="form-control" id="fathers_name" name="fathers_name">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">অভিভাবকের মোবাইল নাম্বার</label>
                                <input type="text" class="form-control" id="fathers_name_bn" name="fathers_name_bn">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Current Address --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">বর্তমান ঠিকানাঃ</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_district">জেলা</label>
                                <input type="text" class="form-control" id="current_district" name="current_district" value="কক্সবাজার">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_upazila">উপজেলা</label>
                                <input type="text" class="form-control" id="current_upazila" name="current_upazila" value="উখিয়া">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_village">গ্রাম</label>
                                <input type="text" class="form-control" id="current_village" name="current_village">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_post_office">ডাকঘর</label>
                                <input type="text" class="form-control" id="current_post_office" name="current_post_office">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Permanent Address --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">স্থায়ী ঠিকানাঃ</div>
                        {{-- Checkbox to copy current address to permanent address --}}
                        <div class="form-check col-12 ml-3">
                            <input class="form-check-input" type="checkbox" id="copy_address" name="copy_address">
                            <label class="form-check-label" for="copy_address">বর্তমান এবং স্থায়ী ঠিকানা একই</label>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanent_district">জেলা</label>
                                <input type="text" class="form-control" id="permanent_district" name="permanent_district">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanent_upazila">উপজেলা</label>
                                <input type="text" class="form-control" id="permanent_upazila" name="permanent_upazila">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanent_village">গ্রাম</label>
                                <input type="text" class="form-control" id="permanent_village" name="permanent_village">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permanent_post_office">ডাকঘর</label>
                                <input type="text" class="form-control" id="permanent_post_office" name="permanent_post_office">
                            </div>
                        </div>
                    </div>

                </div>

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Attach an event listener to the checkbox
                        $('#copy_address').change(function() {
                            if ($(this).is(':checked')) {
                                // If the checkbox is checked, copy values from current address to permanent address
                                $('#permanent_district').val($('#current_district').val());
                                $('#permanent_upazila').val($('#current_upazila').val());
                                $('#permanent_village').val($('#current_village').val());
                                $('#permanent_post_office').val($('#current_post_office').val());
                            } else {
                                // If the checkbox is unchecked, clear values in permanent address
                                $('#permanent_district').val('');
                                $('#permanent_upazila').val('');
                                $('#permanent_village').val('');
                                $('#permanent_post_office').val('');
                            }
                        });
                    });
                </script>


                <div class="my-3" style="border: 1px dashed #ccc; padding:2%;">
                    <div class="row">
                        <div class="col-12">সর্বশেষ পঠিত তথ্যঃ</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="village">সর্বশেষ পঠিত স্কুল/মাদ্রাসার নাম</label>
                                <input type="text" class="form-control" id="village" name="village">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="post_office">ঠিকানা</label>
                                <input type="text" class="form-control" id="post_office" name="post_office">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="village">সর্বশেষ পঠিত শ্রেনী</label>
                                <input type="text" class="form-control" id="village" name="village">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="post_office">সমাপনী পরীক্ষার প্রবেশপত্র</label>
                                <input type="file" class="form-control" id="post_office" name="post_office">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="village">পঞ্চম শ্রেণীর সমাপণী পরীক্ষারর রোল</label>
                                <input type="text" class="form-control" id="village" name="village">
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="village">পাশের সন</label>
                                <input type="text" class="form-control" id="village" name="village">
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="post_office">গ্রেড পয়েন্ট</label>
                                <input type="text" class="form-control" id="post_office" name="post_office">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-3" style="border: 1px dashed #ccc; padding:2%;">
                    <div class="row">
                        <div class="col-12">অন্যান্য তথ্যঃ</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district">মুক্তিযোদ্ধা পরিবারের সদস্য কিনা?</label>
                                <input type="text" class="form-control" id="district" name="district" value="কক্সবাজার">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="upazila">প্রতিবন্ধী কিনা?</label>
                                <input type="text" class="form-control" id="upazila" name="upazila" value="উখিয়া">
                            </div>
                        </div>
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

	

	