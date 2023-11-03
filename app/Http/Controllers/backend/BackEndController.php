<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\{Notice, Teacher};

class BackEndController extends Controller
{
    public function index(){
        if(Auth::check())
        {
            $userInfo = Auth::user();
            if($userInfo->role === 0){
                dd("Please Update your role");
            }
            elseif($userInfo->role === 1)
                return view('backend.index');
            }
            
        return redirect()->route('login')
            ->withErrors([
            'email' => 'ড্যাশবোর্ডে আসার জন্য লগইন করা বাধ্যতামূলক',
        ])->onlyInput('email');
    }

    public function notice(){
        $notice = Notice::where('status', 1)
            ->with('user')
            ->get();

        //dd($notice);
        return view('backend.notice', compact('notice'));
    }

    public function add_notice(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'noticeType' => 'required|string|max:50',
            'noticeSummary' => 'required|string|max:100',
            'noticeFile' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'noticeType.required' => "অবশ্যই নোটিশ টাইপ দিতে হবে",
            'noticeType.max' => "এতবড় নোটিশ টাইপ গ্রহণযোগ্য নয়",
            'noticeSummary.required' => "অবশ্যই নোটিশ সারমর্ম দিতে হবে",
            'noticeSummary.max' => "এতবড় নোটিশ সারমর্ম গ্রহণযোগ্য নয়",
            'noticeFile.required' => "নোটিশ ফাইল দেয়া বাধ্যতামূলক",
            'noticeFile.mimes' => "নোটিশ ফাইল pdf, jpg, jpeg, png ফরম্যাটে হতে হবে",
            'noticeFile.max' => "নোটিশ ফাইলের আকার 2MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('noticeFile')) {
                $file = $request->file('noticeFile');
                // Generate a unique filename
                $filename = 'Notice' . '_' . uniqid() . '.' .  $file->getClientOriginalExtension();
                // Move the uploaded file to the public path
                $file->move(public_path('Resources/Notice/Files'), $filename);
            }
        
            // Create the 'Notice' record
            $notice = Notice::create([
                'notice_type' => $request->noticeType,
                'notice_summary' => $request->noticeSummary,
                'added_by' => Auth::user()->id,
                'notice_file' => isset($filename) ? $filename : null,
            ]);

            if($notice){
                return redirect()->back()->with('success', 'Successfully Added a Notice');
            }
        }
    }

    public function delete_notice($id) {
        try {
            $notice = Notice::findOrFail($id);
            $notice->status = 0;
            $notice->update();
        
            return redirect()->back()->with('success', 'Notice Deleted Successfully');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'Error deleting notice');
        }
    }

    ////////////
    public function teacher(){
        $teacher = Teacher::where('status', 1)
            ->with('user')
            ->get();

        //dd($teacher);
        return view('backend.teacher', compact('teacher'));
    }

    public function add_teacher(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'teacherName' => 'required|string|min:5|max:50',
            'teacherDesignation' => 'required|string|min:5|max:100',
            'teacherDescription' => 'required|string|min:10|max:100',
            'takenSubject' => 'required|string|min:5|max:100',
            'teacherPhoto' => 'required|mimes:jpg,jpeg,png|max:5120',
        ], [
            'teacherName.required' => "অবশ্যই শিক্ষকের নাম দিতে হবে",
            'teacherName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'teacherName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",

            'teacherDesignation.required' => "অবশ্যই শিক্ষকের পদবী দিতে হবে",
            'teacherDesignation.min' => "এতছোট পদবী গ্রহণযোগ্য নয়",
            'teacherDesignation.max' => "এতবড় পদবী গ্রহণযোগ্য নয়",

            'teacherDescription.required' => "অবশ্যই সংখিপ্ত বিবরণ দিতে হবে",
            'teacherDescription.min' => "এতছোট বিবরণ গ্রহণযোগ্য নয়",
            'teacherDescription.max' => "এতবড় বিবরণ গ্রহণযোগ্য নয়",

            'takenSubject.required' => "অবশ্যই শিক্ষকের গৃহীত বিষয় দিতে হবে",
            'takenSubject.min' => "এতছোট গৃহীত বিষয় গ্রহণযোগ্য নয়",
            'takenSubject.max' => "এতবড় গৃহীত বিষয় গ্রহণযোগ্য নয়",

            'teacherPhoto.required' => "শিক্ষকের ছবি দেয়া বাধ্যতামূলক",
            'teacherPhoto.mimes' => "ছবি অবশ্যই pdf, jpg, jpeg, png ফরম্যাটে হতে হবে",
            'teacherPhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('teacherPhoto')) {
                $file = $request->file('teacherPhoto');
                // Generate a unique filename
                $filename = 'Teacher_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // Move the uploaded file to the public path
                $file->move(public_path('Resources/Teachers/Photos'), $filename);
            }
    
            // Create the 'Teacher' record
            $teacher = Teacher::create([
                'teacher_name' => $request->teacherName,
                'teacher_designation' => $request->teacherDesignation,
                'teacher_description' => $request->teacherDescription,
                'taken_subject' => $request->takenSubject,
                'added_by' => Auth::user()->id,
                'teacher_photo' => isset($filename) ? $filename : null,
            ]);
    
            if ($teacher) {
                return redirect()->back()->with('success', 'সফল ভাবে একজন নতুন শিক্ষক যোগ করা হয়েছে');
            }
        }
    }

    public function delete_teacher($id){
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->status = 0;
            $teacher->update();
        
            return redirect()->back()->with('success', 'সফল ভাবে একজন শিক্ষক সরিয়ে দেয়া হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
    
}
