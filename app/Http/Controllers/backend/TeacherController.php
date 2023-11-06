<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Teacher;

class TeacherController extends Controller
{
    //Teacher Management
    public function teacher(){
        $teacher = Teacher::where('status', 1)
            ->with('user')
            ->get();

        //dd($teacher);
        return view('backend.teachers.teacher', compact('teacher'));
    }

    public function add_teacher(){
        return view('backend.teachers.add_teacher');
    }

    public function store_teacher(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'teacherName' => 'required|string|min:5|max:50',
            'teacherDesignation' => 'required|string|min:5|max:100',
            'teacherDescription' => 'required|string|min:10|max:100',
            'takenSubject' => 'required|string|min:5|max:100',
            'teacherPhoto' => 'mimes:jpg,jpeg,png|max:5120',
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
            
            'teacherPhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
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
                return redirect()->route('backend.teacher')->with('success', 'সফল ভাবে একজন নতুন শিক্ষক যুক্ত করা হয়েছে');
            }
        }
    }

    public function edit_teacher($id){
        $teacher = Teacher::find($id);
        return view('backend.teachers.edit_teacher', compact('teacher'));
    }

    public function update_teacher(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'teacherName' => 'required|string|min:5|max:50',
            'teacherDesignation' => 'required|string|min:5|max:100',
            'teacherDescription' => 'required|string|min:10|max:100',
            'takenSubject' => 'required|string|min:5|max:100',
            'teacherPhoto' => 'image|mimes:jpg,jpeg,png|max:5120',
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
            
            'teacherPhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'teacherPhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Find the 'Teacher' record to update
            $teacher = Teacher::find($id);
    
            if (!$teacher) {
                return redirect()->back()
                    ->with('error', 'শিক্ষকের তথ্য পাওয়া যায়নি');
            }

            $teacher->teacher_name = $request->teacherName;
            $teacher->teacher_designation = $request->teacherDesignation;
            $teacher->teacher_description = $request->teacherDescription;
            $teacher->taken_subject = $request->takenSubject;
            $teacher->added_by = Auth::user()->id;
    
            // Check if a new file was uploaded
            if ($request->hasFile('teacherPhoto')) {
                $photo = $request->file('teacherPhoto');
                $filename = 'Teacher_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('Resources/Teachers/Photos'), $filename);
    
                // Delete the old file if it exists
                if ($teacher->teacher_photo) {
                    $oldPhotoPath = public_path('Resources/Teachers/Photos/' . $teacher->teacher_photo);
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }
    
                $teacher->teacher_photo = $filename;
            }
    
            if ($teacher->update()) {
                return redirect()->route('backend.teacher')
                    ->with('success', 'শিক্ষকের তথ্য সফলভাবে আপডেট করা হয়েছে');
            } else {
                return redirect()->back()
                    ->with('error', 'শিক্ষকের তথ্য আপডেট করা যায়নি');
            }
        }
    }
    

    public function delete_teacher($id){
        try {
            $teacher = Teacher::findOrFail($id);
            $teacherPhoto = $teacher->teacher_photo;

            if ($teacherPhoto) {
                // Delete the associated teacher file
                $photo_path = public_path('Resources/Teachers/Photos') . '/' . $teacherPhoto;
                if (file_exists($photo_path)) {
                    unlink($photo_path);
                }
            }

            $teacher->delete(); // Delete the teacher from the database.

            return redirect()->back()->with('success', 'এই শিক্ষকের ডেটা সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the teacher not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
}
