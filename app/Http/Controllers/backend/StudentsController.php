<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{Students};

class StudentsController extends Controller {
    public function students(){
        //dd($students);
        $students = Students::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.students.students', compact('students'));
    }

    public function add_students(){
        return view('backend.students.add_students');
    }

    public function store_students(Request $request) {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'className' => 'required|integer|min:0|max:12',
            'classSection' => 'required|string|max:20',
            'maleStudents' => 'required|integer|min:0|max:250',
            'femaleStudents' => 'required|integer|min:0|max:250',
            'hinduStudents' => 'required|integer|min:0|max:100',
            'buddistStudents' => 'required|integer|min:0|max:100',
        ], [
            'className.required' => "অবশ্যই শ্রেণী দিতে হবে",
            'className.integer' => "শ্রেণী অবশ্যই পূর্ণাংক হতে হবে",
            'className.min' => "শ্রেণী অবশ্যই ৬ অথবা তার চেয়ে বড় হতে হবে",
            'className.max' => "শ্রেণী অবশ্যই ১২ অথবা তার চেয়ে ছোট হতে হবে",
        
            'classSection.required' => "অবশ্যই শাখা দিতে হবে",
            'classSection.string' => "শাখা অবশ্যই স্ট্রিং হতে হবে",
            'classSection.max' => "শাখার নাম অবশ্যই ২০ অক্ষরের মধ্যে হতে হবে",
        
            'maleStudents.required' => "অবশ্যই ছাত্র সংখ্যা দিতে হবে",
            'maleStudents.integer' => "ছাত্র সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'maleStudents.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'maleStudents.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'femaleStudents.required' => "অবশ্যই ছাত্রী সংখ্যা দিতে হবে",
            'femaleStudents.integer' => "ছাত্রী সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'femaleStudents.min' => "ছাত্রী সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'femaleStudents.max' => "ছাত্রী সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'hinduStudents.required' => "অবশ্যই হিন্দু ছাত্র সংখ্যা দিতে হবে",
            'hinduStudents.integer' => "হিন্দু ছাত্র সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'hinduStudents.min' => "হিন্দু ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'hinduStudents.max' => "হিন্দু ছাত্র সংখ্যা অবশ্যই ১০০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'buddistStudents.required' => "অবশ্যই বৌদ্ধ ছাত্র সংখ্যা দিতে হবে",
            'buddistStudents.integer' => "বৌদ্ধ ছাত্র সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'buddistStudents.min' => "বৌদ্ধ ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'buddistStudents.max' => "বৌদ্ধ ছাত্র সংখ্যা অবশ্যই ১০০ অথবা তার চেয়ে ছোট হতে হবে",
        ]);        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Create the 'Student' record
            $student = Students::create([
                'class_name' => $request->className,
                'class_section' => $request->classSection,
                'male_students' => $request->maleStudents,
                'female_students' => $request->femaleStudents,
                'hindu_students' => $request->hinduStudents,
                'buddhist_students' => $request->buddistStudents,
                'added_by' => Auth::user()->id,
            ]);
        
            if ($student) {
                return redirect('backend.students')->with('success', 'সফল ভাবে নতুন একটি শ্রেণী যুক্ত করা হয়েছে');
            }
        }
    }
    
    public function delete_students($id){
        try {
            $students = Students::findOrFail($id);
            $students->status = 0;
            $students->update();
        
            return redirect()->back()->with('success', 'শ্রেণী টি সফল ভাবে সরিয়ে দেয়া হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }

    public function edit_students($id){
        //dd($id);
        $class = Students::find($id);
        //dd($class);
        return view('backend.students.edit_students', compact('class'));
    }

    public function update_students(Request $request, $student_id){
        //dd($request->all(), $student_id);
        $validator = Validator::make($request->all(), [
            'className' => 'required|integer|min:0|max:12',
            'classSection' => 'required|string|max:20',
            'maleStudents' => 'required|integer|min:0|max:250',
            'femaleStudents' => 'required|integer|min:0|max:250',
            'hinduStudents' => 'required|integer|min:0|max:100',
            'buddistStudents' => 'required|integer|min:0|max:100',
        ], [
            'className.required' => "অবশ্যই শ্রেণী দিতে হবে",
            'className.integer' => "শ্রেণী অবশ্যই পূর্ণাংক হতে হবে",
            'className.min' => "শ্রেণী অবশ্যই ৬ অথবা তার চেয়ে বড় হতে হবে",
            'className.max' => "শ্রেণী অবশ্যই ১২ অথবা তার চেয়ে ছোট হতে হবে",
        
            'classSection.required' => "অবশ্যই শাখা দিতে হবে",
            'classSection.string' => "শাখা অবশ্যই স্ট্রিং হতে হবে",
            'classSection.max' => "শাখার নাম অবশ্যই ২০ অক্ষরের মধ্যে হতে হবে",
        
            'maleStudents.required' => "অবশ্যই ছাত্র সংখ্যা দিতে হবে",
            'maleStudents.integer' => "ছাত্র সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'maleStudents.min' => "ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'maleStudents.max' => "ছাত্র সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'femaleStudents.required' => "অবশ্যই ছাত্রী সংখ্যা দিতে হবে",
            'femaleStudents.integer' => "ছাত্রী সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'femaleStudents.min' => "ছাত্রী সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'femaleStudents.max' => "ছাত্রী সংখ্যা অবশ্যই ২৫০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'hinduStudents.required' => "অবশ্যই হিন্দু ছাত্র সংখ্যা দিতে হবে",
            'hinduStudents.integer' => "হিন্দু ছাত্র সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'hinduStudents.min' => "হিন্দু ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'hinduStudents.max' => "হিন্দু ছাত্র সংখ্যা অবশ্যই ১০০ অথবা তার চেয়ে ছোট হতে হবে",
        
            'buddistStudents.required' => "অবশ্যই বৌদ্ধ ছাত্র সংখ্যা দিতে হবে",
            'buddistStudents.integer' => "বৌদ্ধ ছাত্র সংখ্যা অবশ্যই পূর্ণাংক হতে হবে",
            'buddistStudents.min' => "বৌদ্ধ ছাত্র সংখ্যা অবশ্যই ০ অথবা তার চেয়ে বড় হতে হবে",
            'buddistStudents.max' => "বৌদ্ধ ছাত্র সংখ্যা অবশ্যই ১০০ অথবা তার চেয়ে ছোট হতে হবে",
        ]);        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Update the 'Student' record
            $student = Students::find($student_id);
    
            if ($student) {
                $student->class_name = $request->className;
                $student->class_section = $request->classSection;
                $student->male_students = $request->maleStudents;
                $student->female_students = $request->femaleStudents;
                $student->hindu_students = $request->hinduStudents;
                $student->buddhist_students = $request->buddistStudents;
                $student->added_by = Auth::user()->id;
                $student->update();
    
                return redirect('backend.students')->with('success', 'শ্রেণীটি সফল ভাবে আপডেট করা হয়েছে');
            }
            else{
                dd("Bssssl");
            }
        }
        
    }
}
