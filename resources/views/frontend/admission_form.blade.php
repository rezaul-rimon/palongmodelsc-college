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
                margin-left: 10px;
            }

            input{
                margin-top: -10px;
            }

            select{
                margin-top: -10px;
            }

        </style>
        
        <div class="admission-form col-md-8 offset-md-2">
            <form action="{{ route('frontend.admission_store') }}" method="POST">
                @csrf
                
                {{-- Personal Information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_bn">নাম (বাংলাতে)</label>
                                <input type="text" class="form-control @error('name_bn') is-invalid @enderror" id="name_bn" name="name_bn" placeholder="যেমনঃ রেজাউল ইসলাম খান" value="{{ old('name_bn') }}">
                                @error('name_bn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name (In English)</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Example: Rezaul Islam Khan" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">লিঙ্গ</label>
                                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ছেলে</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>মেয়ে</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>অন্যান্য</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nationality">জাতীয়তা</label>
                                <select class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="bangladeshi" {{ old('nationality') == 'bangladeshi' ? 'selected' : '' }}>বাংলাদেশী</option>
                                    <option value="chakma" {{ old('nationality') == 'chakma' ? 'selected' : '' }}>চাকমা</option>
                                    <option value="marma" {{ old('nationality') == 'marma' ? 'selected' : '' }}>মারমা</option>
                                    <option value="rakhain" {{ old('nationality') == 'rakhain' ? 'selected' : '' }}>রাখাইন</option>
                                    <option value="rohinga" {{ old('nationality') == 'rohinga' ? 'selected' : '' }}>রোহিঙ্গা</option>
                                    <option value="other" {{ old('nationality') == 'other' ? 'selected' : '' }}>অন্যান্য</option>
                                </select>
                                @error('nationality')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">ধর্ম</label>
                                <select class="form-control @error('religion') is-invalid @enderror" id="religion" name="religion">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="muslim" {{ old('religion') == 'muslim' ? 'selected' : '' }}>মুসলিম</option>
                                    <option value="hindu" {{ old('religion') == 'hindu' ? 'selected' : '' }}>হিন্দু</option>
                                    <option value="buddhist" {{ old('religion') == 'buddhist' ? 'selected' : '' }}>বৌদ্ধ</option>
                                    <option value="christian" {{ old('religion') == 'christian' ? 'selected' : '' }}>খ্রীষ্ঠান</option>
                                    <option value="other" {{ old('religion') == 'other' ? 'selected' : '' }}>অন্যান্য</option>
                                </select>
                                @error('religion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">জন্ম তারিখ</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                                @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_cft_no" class="form-label">জন্ম নিবন্ধন নাম্বার</label>
                                <input type="text" class="form-control form-control-sm @error('birth_cft_no') is-invalid @enderror" id="birth_cft_no" name="birth_cft_no" placeholder="যেমনঃ 20121314511000225" value="{{ old('birth_cft_no') }}">
                                @error('birth_cft_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo">ছবি</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birth_cft_file">জন্ম নিবন্ধন</label>
                                <input type="file" class="form-control @error('birth_cft_file') is-invalid @enderror" id="birth_cft_file" name="birth_cft_file">
                                @error('birth_cft_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Fathers and Mothers information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">পিতা মাতার তথ্যঃ</div>

                        {{-- Father's Information --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name_bn">পিতার নাম (বাংলাতে)</label>
                                <input type="text" class="form-control @error('fathers_name_bn') is-invalid @enderror" id="fathers_name_bn" name="fathers_name_bn" placeholder="যেমনঃ রফিকুল ইসলাম খান" value="{{ old('fathers_name_bn') }}">
                                @error('fathers_name_bn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">Father's Name (In English)</label>
                                <input type="text" class="form-control @error('fathers_name') is-invalid @enderror" id="fathers_name" name="fathers_name" placeholder="Example: Rafiqul Islam Khan" value="{{ old('fathers_name') }}">
                                @error('fathers_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_proff">পিতার পেশা</label>
                                <input type="text" class="form-control @error('fathers_proff') is-invalid @enderror" id="fathers_proff" name="fathers_proff" placeholder="যেমনঃ কৃষি/শিক্ষক/ড্রাইভার" value="{{ old('fathers_proff') }}">
                                @error('fathers_proff')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_location">পিতার বর্তমান অবস্থান</label>
                                <input type="text" class="form-control @error('fathers_location') is-invalid @enderror" id="fathers_location" name="fathers_location" placeholder="যেমনঃ দেশে/সিঙ্গাপুর/ঢাকা" value="{{ old('fathers_location') }}">
                                @error('fathers_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_income">পিতার বার্ষিক আয় (টাকায়)</label>
                                <input type="text" class="form-control @error('fathers_income') is-invalid @enderror" id="fathers_income" name="fathers_income" placeholder="যেমনঃ 500000" value="{{ old('fathers_income') }}">
                                @error('fathers_income')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_property">পিতার সম্পত্তির পরিমান</label>
                                <input type="text" class="form-control @error('fathers_property') is-invalid @enderror" id="fathers_property" name="fathers_property" placeholder="যেমনঃ ১০ বিঘা/কাঠা/শতাংশ" value="{{ old('fathers_property') }}">
                                @error('fathers_property')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_phone">পিতার মোবাইল</label>
                                <input type="text" class="form-control @error('fathers_phone') is-invalid @enderror" id="fathers_phone" name="fathers_phone" placeholder="01712345678" value="{{ old('fathers_phone') }}">
                                @error('fathers_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fathers_nid">পিতার NID</label>
                                <input type="file" class="form-control @error('fathers_nid') is-invalid @enderror" id="fathers_nid" name="fathers_nid">
                                @error('fathers_nid')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12"><hr><hr></div>
    
                    {{-- Mother's Information --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_name_bn">মাতার নাম (বাংলাতে)</label>
                                <input type="text" class="form-control @error('mothers_name_bn') is-invalid @enderror" id="mothers_name_bn" name="mothers_name_bn" placeholder="যেমনঃ রোজিনা বেগম" value="{{ old('mothers_name_bn') }}">
                                @error('mothers_name_bn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_name">Mother's Name (In English)</label>
                                <input type="text" class="form-control @error('mothers_name') is-invalid @enderror" id="mothers_name" name="mothers_name" placeholder="Example: Rozina Begum" value="{{ old('mothers_name') }}">
                                @error('mothers_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_proff">মাতার পেশা</label>
                                <input type="text" class="form-control @error('mothers_proff') is-invalid @enderror" id="mothers_proff" name="mothers_proff" placeholder="যেমনঃ গৃহিণী/শিক্ষিকা" value="{{ old('mothers_proff') }}">
                                @error('mothers_proff')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_location">মাতার বর্তমান অবস্থান</label>
                                <input type="text" class="form-control @error('mothers_location') is-invalid @enderror" id="mothers_location" name="mothers_location" placeholder="যেমনঃ দেশে/মালেশিয়া/ঢাকা" value="{{ old('mothers_location') }}">
                                @error('mothers_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_income">মাতার বার্ষিক আয়</label>
                                <input type="text" class="form-control @error('mothers_income') is-invalid @enderror" id="mothers_income" name="mothers_income" placeholder="যেমনঃ 350000" value="{{ old('mothers_income') }}">
                                @error('mothers_income')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_property">মাতার সম্পত্তির পরিমান</label>
                                <input type="text" class="form-control @error('mothers_property') is-invalid @enderror" id="mothers_property" name="mothers_property" placeholder="যেমনঃ ৫ কাঠা/বিঘা/শতাংশ" value="{{ old('mothers_property') }}">
                                @error('mothers_property')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_phone">মাতার মোবাইল</label>
                                <input type="text" class="form-control @error('mothers_phone') is-invalid @enderror" id="mothers_phone" name="mothers_phone" placeholder="যেমনঃ 01712345678" value="{{ old('mothers_phone') }}">
                                @error('mothers_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mothers_nid">মাতার NID</label>
                                <input type="file" class="form-control @error('mothers_nid') is-invalid @enderror" id="mothers_nid" name="mothers_nid">
                                @error('mothers_nid')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>

                {{-- Guirdians Information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">স্থানীয় অভিভাবকের তথ্যঃ</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardians_name">অভিভাবকের নামঃ</label>
                                <input type="text" class="form-control" id="guardians_name" name="guardians_name" placeholder="যেমনঃ রোজিনা বেগম">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardians_relation">অভিভাবকের সাথে সম্পর্ক</label>
                                <input type="text" class="form-control" id="guardians_relation" name="guardians_relation" placeholder="যেমনঃ মা/বাবা/চাচা/মামা/ভাই">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardians_address">অভিভাবকের ঠিকানা</label>
                                <input type="text" class="form-control" id="guardians_address" name="guardians_address" placeholder="যেমনঃ রত্নাপালং, উখিয়া">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="guardians_phone">অভিভাবকের মোবাইল নাম্বার</label>
                                <input type="text" class="form-control" id="guardians_phone" name="guardians_phone" placeholder="যেমনঃ 01712345678">
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
                                <label for="law_guardians_name">অভিভাবকের নামঃ</label>
                                <input type="text" class="form-control" id="law_guardians_name" name="law_guardians_name" placeholder="যেমনঃ জালাল উদ্দিন খান">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="law_guardians_relation">অভিভাবকের সাথে সম্পর্ক</label>
                                <input type="text" class="form-control" id="law_guardians_relation" name="law_guardians_relation" placeholder="যেমনঃ চাচা/মামা/খালা">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="law_guardians_address">অভিভাবকের ঠিকানা</label>
                                <input type="text" class="form-control" id="law_guardians_address" name="law_guardians_address" placeholder="যেমনঃ ফরাজী পাড়া, চকরিয়া">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="law_guardians_phone">অভিভাবকের মোবাইল নাম্বার</label>
                                <input type="text" class="form-control" id="law_guardians_phone" name="law_guardians_phone" placeholder="যেমনঃ 01712345678">
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
                                <input type="text" class="form-control" id="current_village" name="current_village" placeholder="যেমনঃ রত্নাপালং">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="current_post_office">ডাকঘর</label>
                                <input type="text" class="form-control" id="current_post_office" name="current_post_office" placeholder="যেমনঃ রত্নাপালং">
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

                {{-- Last School --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding:3%; border-radius: 10px; ">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color:#6610f2;">সর্বশেষ পঠিত তথ্যঃ</div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_school">সর্বশেষ পঠিত স্কুল/মাদ্রাসার নাম</label>
                                <input type="text" class="form-control" id="last_school" name="last_school" placeholder="যেমনঃ পোকখালী আদর্শ উচ্চ বিদ্যালয়">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_school_address">ঠিকানা</label>
                                <input type="text" class="form-control" id="last_school_address" name="last_school_address" placeholder="যেমনঃ পোকখালী, ঈদগাহ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_class">সর্বশেষ পঠিত শ্রেনী</label>
                                <select class="form-control" id="class_5_roll" name="class_5_roll">
                                    <option value="" selected>নির্বাচন করুন</option>
                                    <option value="5">৫ম</option>
                                    <option value="6">৬ষ্ঠ</option>
                                    <option value="7">৭ম</option>
                                    <option value="8">৮ম</option>
                                    <option value="9">৯ম</option>
                                    <option value="10">১০ম</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_class_admit">সর্বশেষ বার্ষিক পরীক্ষার প্রবেশপত্র</label>
                                <input type="file" class="form-control" id="last_class_admit" name="last_class_admit">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_5_roll">পঞ্চম শ্রেণীর সমাপণী পরীক্ষারর রোল</label>
                                <input type="text" class="form-control" id="class_5_roll" name="class_5_roll" placeholder="যেমনঃ 1020304050">
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_5_year">পাশের সন</label>
                                <input type="text" class="form-control" id="class_5_year" name="class_5_year" placeholder="2022">
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="class_5_gpa">গ্রেড পয়েন্ট</label>
                                <input type="text" class="form-control" id="class_5_gpa" name="class_5_gpa" placeholder="যেমনঃ ৩.৭৫">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Others Information --}}
                <div class="my-3" style="border: 1px dashed #fd7e14; padding: 3%; border-radius: 10px;">
                    <div class="row">
                        <div class="col-12 text-center mb-3" style="font-size: 20px; color: #6610f2;">অন্যান্য তথ্যঃ</div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="protibondhi">প্রতিবন্ধী কিনা?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input ml-2" type="radio" name="protibondhi" id="protibondhi_yes" value="yes">
                                    <label class="form-check-label" for="protibondhi_yes">হ্যাঁ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="protibondhi" id="protibondhi_no" value="no" checked>
                                    <label class="form-check-label" for="protibondhi_no">না</label>
                                </div>
                            </div>

                            <!-- Additional input fields for প্রতিবন্ধী কিনা? -->
                            <div class="row" id="protibondhi_fields" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="protibondhi_type">প্রতিবন্ধকতার ধরন</label>
                                        <input type="text" class="form-control" id="protibondhi_type" name="protibondhi_type" placeholder="যেমনঃ শারিরিক/মানষিক/বাক">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="protibondhi_certificate">সার্টিফিকেট</label>
                                        <input type="file" class="form-control" id="protibondhi_certificate" name="protibondhi_certificate">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="muktijoddha">মুক্তিযোদ্ধা পরিবারের সদস্য কিনা?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input ml-2" type="radio" name="muktijoddha" id="muktijoddha_yes" value="yes">
                                    <label class="form-check-label" for="muktijoddha_yes">হ্যাঁ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="muktijoddha" id="muktijoddha_no" value="no" checked>
                                    <label class="form-check-label" for="muktijoddha_no">না</label>
                                </div>
                            </div>

                            <!-- Additional input fields for মুক্তিযোদ্ধা কিনা? -->
                            <div class="row" id="muktijoddha_fields" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="muktijoddha_relation">মুক্তিযোদ্ধার সাথে সম্পর্ক</label>
                                        <input type="text" class="form-control" id="muktijoddha_relation" name="muktijoddha_relation" placeholder="যেমনঃ বাবা/দাদা/নানা">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="muktijoddha_certificate">সার্টিফিকেট</label>
                                        <input type="file" class="form-control" id="muktijoddha_certificate" name="muktijoddha_certificate">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="brother_sister_school">ভাই বোন অত্র স্কুলে পড়ে কিনা? </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input ml-2" type="radio" name="brother_sister_school" id="brother_sister_school_yes" value="yes">
                                    <label class="form-check-label" for="brother_sister_school_yes">হ্যাঁ</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="brother_sister_school" id="brother_sister_school_no" value="no" checked>
                                    <label class="form-check-label" for="brother_sister_school_no">না</label>
                                </div>
                            </div>

                            <!-- Additional input fields for "ভাই বোন অত্র স্কুলে পড়ে কিনা?" -->
                            <div class="row" id="brother_sister_school_fields" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="brother_sister_name">ভাই/বোনের নাম</label>
                                        <input type="text" class="form-control" id="brother_sister_name" name="brother_sister_name" placeholder="যেমনঃ তামান্না পপি">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="brother_sister_section">রোল</label>
                                        <input type="text" class="form-control" id="brother_sister_section" name="brother_sister_section" placeholder="যেমনঃ ১৫">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="brother_sister_class">শ্রেণি</label>
                                        <select class="form-control" id="brother_sister_class" name="brother_sister_class">
                                            <option value="" selected>নির্বাচন করুন</option>
                                            <option value="6">৬ষ্ঠ</option>
                                            <option value="7">৭ম</option>
                                            <option value="8">৮ম</option>
                                            <option value="9">৯ম</option>
                                            <option value="10">১০ম</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="brother_sister_branch">শাখা</label>
                                        <select class="form-control" id="brother_sister_section" name="brother_sister_section">
                                            <option value="" selected>নির্বাচন করুন</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        
                    </div>
                </div>

                <script>
                    // Show/hide additional fields for "ভাই বোন অত্র স্কুলে পড়ে কিনা?" based on radio button selection
                    document.addEventListener('DOMContentLoaded', function () {
                        const brotherSisterSchoolRadio = document.querySelectorAll('input[name="brother_sister_school"]');
                        const brotherSisterSchoolFields = document.getElementById('brother_sister_school_fields');

                        brotherSisterSchoolRadio.forEach(function (radio) {
                            radio.addEventListener('change', function () {
                                if (radio.value === 'yes') {
                                    brotherSisterSchoolFields.style.display = 'flex';
                                } else {
                                    brotherSisterSchoolFields.style.display = 'none';
                                }
                            });
                        });

                        const muktijoddhaRadio = document.querySelectorAll('input[name="muktijoddha"]');
                        const muktijoddhaFields = document.getElementById('muktijoddha_fields');

                        muktijoddhaRadio.forEach(function (radio) {
                            radio.addEventListener('change', function () {
                                if (radio.value === 'yes') {
                                    muktijoddhaFields.style.display = 'flex';
                                } else {
                                    muktijoddhaFields.style.display = 'none';
                                }
                            });
                        });

                        const protibondhiRadio = document.querySelectorAll('input[name="protibondhi"]');
                        const protibondhiFields = document.getElementById('protibondhi_fields');

                        protibondhiRadio.forEach(function (radio) {
                            radio.addEventListener('change', function () {
                                if (radio.value === 'yes') {
                                    protibondhiFields.style.display = 'flex';
                                } else {
                                    protibondhiFields.style.display = 'none';
                                }
                            });
                        });
                    });
                </script>


                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="button" class="form-control bg-warning" value="বাতিল করুন" style="background-color: #fd7e14 !important; border-radius: 10px !important">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="form-control" value="জমা দিন" style="background-color: #6214fd !important; border-radius: 10px !important; color:white !important;">
                            </div>
                        </div>
                    </div>
            </div>
            
            </form>
        </div>

    </div>
    
    <div class="mt-5"></div>

@endsection

	

	