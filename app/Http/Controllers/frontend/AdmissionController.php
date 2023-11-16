<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdmissionController extends Controller
{
    //////Admission
    public function admission(){
        $banner_text = "অনলাইনে ভর্তি";
        return view('frontend.admission_form', compact('banner_text'));
    }

    public function admission_store(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'name_bn' => 'required|string|min:5|max:30|regex:/^[\x{0980}-\x{09FF}\s]+$/u',
            // 'name' => 'required|string|min:5|max:25|regex:/^[a-zA-Z.\:\-\s]+$/u',
            // 'gender' => 'required|string|min:3|max:10',
            // 'nationality' => 'required|string|min:3|max:12',
            // 'religion' => 'required|string|min:3|max:10',
            // 'dob' => 'required|date',
            // 'birth_cft_no' => 'required|min:10|max:20|numeric',
            // 'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            // 'birth_cft_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',

            // 'fathers_name_bn' => 'required|string|min:5|max:30|regex:/^[\x{0980}-\x{09FF}\s]+$/u',
            // 'fathers_name' => 'required|string|min:5|max:25|regex:/^[a-zA-Z.\:\-\s]+$/u',
            // 'fathers_proff' => 'required|string|min:5|max:25',
            // 'fathers_location' => 'required|string|min:5|max:25',
            // 'fathers_income' => 'required|min:4|max:10|numeric',
            // 'fathers_property' => 'required|string|min:5|max:25',
            // 'fathers_phone' => 'required|min:11|max:14|numeric',
            // 'fathers_nid' => 'required|min:10|max:20|numeric',

            'mothers_name_bn' => 'required|string|min:5|max:30|regex:/^[\x{0980}-\x{09FF}\s]+$/u',
            'mothers_name' => 'required|string|min:5|max:25|regex:/^[a-zA-Z.\:\-\s]+$/u',
            'mothers_proff' => 'required|string|min:5|max:25',
            'mothers_location' => 'required|string|min:5|max:25',
            'mothers_income' => 'required|min:4|max:10|numeric',
            'mothers_property' => 'required|string|min:5|max:25',
            'mothers_phone' => 'required|min:11|max:14|numeric',
            'mothers_nid' => 'required|min:10|max:20|numeric',

            // 'guardians_name' => 'required',
            // 'guardians_relation' => 'required',
            // 'guardians_address' => 'required',
            // 'guardians_phone' => 'required',
            // 'law_guardians_name' => 'required',
            // 'law_guardians_relation' => 'required',
            // 'law_guardians_address' => 'required',
            // 'law_guardians_phone' => 'required',
            // 'current_district' => 'required|string',
            // 'current_upazila' => 'required|string',
            // 'current_village' => 'required',
            // 'current_post_office' => 'required',
            // 'permanent_district' => 'required',
            // 'permanent_upazila' => 'required',
            // 'permanent_village' => 'required',
            // 'permanent_post_office' => 'required',
            // 'last_school' => 'required',
            // 'last_school_address' => 'required',
            // 'class_5_roll' => 'required',
            // 'last_class_admit' => 'required',
            // 'class_5_year' => 'required',
            // 'class_5_gpa' => 'required',
            // 'protibondhi' => 'required|in:yes,no',
            // 'protibondhi_type' => 'required',
            // 'protibondhi_certificate' => 'required',
            // 'muktijoddha' => 'required|in:yes,no',
            // 'muktijoddha_relation' => 'required',
            // 'muktijoddha_certificate' => 'required',
            // 'brother_sister_school' => 'required|in:yes,no',
            // 'brother_sister_name' => 'required',
            // 'brother_sister_section' => 'required',
            // 'brother_sister_class' => 'required',
        ]);
        
        // Additional logic to handle validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        dd($validator);
        
        // Continue with data processing if validation passes
        // ...
        
    }
}
