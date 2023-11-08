<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{StipendStudents};

class StipendStudentsController extends Controller
{
    public function stipend_students(){
        //dd($students);
        $students = StipendStudents::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.students.stipend_students', compact('students'));
    }

    public function add_stipend_students(){
        return view('backend.students.add_stipend_students');
    }

    public function store_stipend_students(Request $request) {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|integer|min:0|max:12',
            'gov_stipend_male' => 'required|integer|min:0|max:250',
            'gov_stipend_female' => 'required|integer|min:0|max:250',
            'sub_stipend_male' => 'required|integer|min:0|max:250',
            'sub_stipend_female' => 'required|integer|min:0|max:250',
        ], [
            'class_name.required' => "অবশ্যই শ্রেণী দিতে হবে",
            'class_name.min' => "শ্রেণী অবশ্যই ৬ অথবা তার চেয়ে বড় হতে হবে",
            'class_name.max' => "শ্রেণী অবশ্যই ১২ অথবা তার চেয়ে ছোট হতে হবে",
        
            'gov_stipend_male.required' => "অবশ্যই ছাত্র সংখ্যা দিতে হবে",
            'gov_stipend_male.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'gov_stipend_male.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'gov_stipend_female.required' => "অবশ্যই ছাত্রী সংখ্যা দিতে হবে",
            'gov_stipend_female.min' => "ছাত্রী সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'gov_stipend_female.max' => "ছাত্রী সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'sub_stipend_male.required' => "অবশ্যই হিন্দু ছাত্র সংখ্যা দিতে হবে",
            'sub_stipend_male.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'sub_stipend_male.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'sub_stipend_female.required' => "অবশ্যই বৌদ্ধ ছাত্র সংখ্যা দিতে হবে",
            'sub_stipend_female.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'sub_stipend_female.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        ]);        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create the 'Student' record
            $student = StipendStudents::create([
                'class_name' => $request->class_name,
                'gov_stipend_male' => $request->gov_stipend_male,
                'gov_stipend_female' => $request->gov_stipend_female,
                'sub_stipend_male' => $request->sub_stipend_male,
                'sub_stipend_female' => $request->sub_stipend_female,
                'added_by' => Auth::user()->id,
            ]);
        
            if ($student) {
                return redirect()->route('backend.stipend_students')->with('success', 'সফল ভাবে নতুন একটি বৃত্তিপ্রাপ্ত শ্রেণী যুক্ত করা হয়েছে');
            }
        }
    }

    public function edit_stipend_students($id){
        $student = StipendStudents::find($id);
        return view('backend.students.edit_stipend_students', compact('student'));
    }

    public function update_stipend_students(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|integer|min:0|max:12',
            'gov_stipend_male' => 'required|integer|min:0|max:250',
            'gov_stipend_female' => 'required|integer|min:0|max:250',
            'sub_stipend_male' => 'required|integer|min:0|max:250',
            'sub_stipend_female' => 'required|integer|min:0|max:250',
        ], [
            'class_name.required' => "অবশ্যই শ্রেণী দিতে হবে",
            'class_name.min' => "শ্রেণী অবশ্যই ৬ অথবা তার চেয়ে বড় হতে হবে",
            'class_name.max' => "শ্রেণী অবশ্যই ১২ অথবা তার চেয়ে ছোট হতে হবে",
        
            'gov_stipend_male.required' => "অবশ্যই ছাত্র সংখ্যা দিতে হবে",
            'gov_stipend_male.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'gov_stipend_male.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'gov_stipend_female.required' => "অবশ্যই ছাত্রী সংখ্যা দিতে হবে",
            'gov_stipend_female.min' => "ছাত্রী সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'gov_stipend_female.max' => "ছাত্রী সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'sub_stipend_male.required' => "অবশ্যই হিন্দু ছাত্র সংখ্যা দিতে হবে",
            'sub_stipend_male.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'sub_stipend_male.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'sub_stipend_female.required' => "অবশ্যই বৌদ্ধ ছাত্র সংখ্যা দিতে হবে",
            'sub_stipend_female.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'sub_stipend_female.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        ]);        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $student = StipendStudents::find($id); // Find the specific student by ID
    
            if (!$student) {
                return redirect()->route('backend.stipend_students')->with('error', 'এই শ্রেণীর তথ্য পাওয়া যায়নি');
            }
    
            // Update the 'Student' record
            $student->class_name = $request->class_name;
            $student->gov_stipend_male = $request->gov_stipend_male;
            $student->gov_stipend_female = $request->gov_stipend_female;
            $student->sub_stipend_male = $request->sub_stipend_male;
            $student->sub_stipend_female = $request->sub_stipend_female;
            $student->added_by = Auth::user()->id;
    
            if ($student->update()) {
                return redirect()->route('backend.stipend_students')->with('success', 'এই শ্রেণীর তথ্য সফলভাবে আপডেট করা হয়েছে');
            } else {
                return redirect()->route('backend.stipend_students')->with('error', 'এই শ্রেণীর তথ্য আপডেট করা যায়নি');
            }
        }
    }

    public function delete_stipend_students($id){
        try {
            $student = StipendStudents::findOrFail($id);
            
            // Perform a permanent delete
            $student->delete();
            
            return redirect()->route('backend.stipend_students')->with('success', 'শ্রেণী টি সফল ভাবে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the student not being found.
            return redirect()->route('backend.stipend_students')->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }    
}
