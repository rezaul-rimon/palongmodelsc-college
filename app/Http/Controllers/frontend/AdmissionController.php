<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    //////Admission
    public function admission(){
        $banner_text = "অনলাইনে ভর্তি";
        return view('frontend.admission_form', compact('banner_text'));
    }

    public function admission_store(Request $request){
        dd($request->all());
    }
}
