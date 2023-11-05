<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{Notice, Teacher, Committee, Event, Gallery, Students};

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

    //Teacher Management
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
                return redirect()->back()->with('success', 'সফল ভাবে একজন নতুন শিক্ষক যুক্ত করা হয়েছে');
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

    //Committee Management
    public function committee(){
        $committee = Committee::where('status', 1)
            ->with('user')
            ->get();

        //dd($committee);
        return view('backend.committee', compact('committee'));
    }

    public function add_committee(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'committeeName' => 'required|string|min:5|max:50',
            'committeeDesignation' => 'required|string|min:5|max:100',
            'committeePhoto' => 'mimes:jpg,jpeg,png|max:5120',
        ], [
            'committeeName.required' => "অবশ্যই শিক্ষকের নাম দিতে হবে",
            'committeeName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'committeeName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",

            'committeeDesignation.required' => "অবশ্যই শিক্ষকের পদবী দিতে হবে",
            'committeeDesignation.min' => "এতছোট পদবী গ্রহণযোগ্য নয়",
            'committeeDesignation.max' => "এতবড় পদবী গ্রহণযোগ্য নয়",

            'committeePhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'committeePhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('committeePhoto')) {
                $file = $request->file('committeePhoto');
                // Generate a unique filename
                $filename = 'Committee_Member_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // Move the uploaded file to the public path
                $file->move(public_path('Resources/Committee/Photos'), $filename);
            }
    
            // Create the 'Committee' record
            $committee = Committee::create([
                'committee_name' => $request->committeeName,
                'committee_designation' => $request->committeeDesignation,
                'added_by' => Auth::user()->id,
                'committee_photo' => isset($filename) ? $filename : null,
            ]);
    
            if ($committee) {
                return redirect()->back()->with('success', 'সফল ভাবে নতুন একজন কমিটি সদস্য যুক্ত করা হয়েছে');
            }
        }
    }

    public function delete_committee($id){
        try {
            $committee = Committee::findOrFail($id);
            $committee->status = 0;
            $committee->update();
        
            return redirect()->back()->with('success', 'সফল ভাবে একজন কমিটি সদিস্য সরিয়ে দেয়া হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }

    //Event Management
    public function event(){
        //dd($event);
        $event = Event::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.event', compact('event'));
    }

    public function add_event(Request $request) {
        $validator = Validator::make($request->all(), [
            'eventName' => 'required|string|min:5|max:50',
            'eventDescription' => 'required|string|min:5|max:1200',
            'eventDate' => 'required|date|after:tomorrow',
            'eventPhoto' => 'mimes:jpg,jpeg,png|max:5120',
        ], [
            'eventName.required' => "অবশ্যই ইভেন্টের নাম দিতে হবে",
            'eventName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'eventName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",
    
            'eventDescription.required' => "অবশ্যই ইভেন্টের বিস্তারিত দিতে হবে",
            'eventDescription.min' => "এতছোট ইভেন্ট বিস্তারিত গ্রহণযোগ্য নয়",
            'eventDescription.max' => "এতবড় ইভেন্ট বিস্তারিত গ্রহণযোগ্য নয়",
    
            'eventDate.required' => 'ইভেন্টের তারিখ দিতে হবে',
            'eventDate.date' => 'তারিখ টি সঠিক হতে হবে',
            'eventDate.after' => 'ইভেন্টের তারিখ আজ অতবা গত তারিখ হতে পারবে না',
    
            'eventPhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'eventPhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('eventPhoto')) {
                $file = $request->file('eventPhoto');
                // Generate a unique filename
                $filename = 'Event_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // Move the uploaded file to the public path
                $file->move(public_path('Resources/Event/Photos'), $filename);
            }
    
            // Create the 'Event' record
            $event = Event::create([
                'event_name' => $request->eventName, // Corrected variable name
                'event_description' => $request->eventDescription, // Corrected variable name
                'event_date' => $request->eventDate, // Corrected variable name
                'added_by' => Auth::user()->id,
                'event_photo' => isset($filename) ? $filename : null,
            ]);
    
            if ($event) {
                return redirect()->back()->with('success', 'সফল ভাবে নতুন একটি ইভেন্ট যুক্ত করা হয়েছে');
            }
        }
    }
    
    public function delete_event($id){
        try {
            $event = Event::findOrFail($id);
            $event->status = 0;
            $event->update();
        
            return redirect()->back()->with('success', 'ইভেন্ট টি সফল ভাবে সরিয়ে দেয়া হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
    
    //Gallery Management
    public function gallery(){
        //dd($gallery);
        $gallery = Gallery::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.gallery', compact('gallery'));
    }

    public function add_gallery(Request $request) {
        $validator = Validator::make($request->all(), [
            'galleryTitle' => 'required|string|min:5|max:100',
            'galleryPhotos' => 'required|array',
            'galleryPhotos.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'galleryTitle.required' => "অবশ্যই গ্যালারীর নাম দিতে হবে",
            'galleryTitle.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'galleryTitle.max' => "এতবড় নাম গ্রহণযোগ্য নয়",
        
            'galleryPhotos.required' => "অবশ্যই ছবি দিতে হবে",
            'galleryPhotos.array' => "ছবি সমূহ অবশ্যই একটি স্পষ্ট তালিকা হতে হবে",
        
            'galleryPhotos.*.image' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'galleryPhotos.*.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'galleryPhotos.*.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);
        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if files were uploaded
            if ($request->hasFile('galleryPhotos')) {
                $imagePaths = [];
        
                foreach ($request->file('galleryPhotos') as $file) {
                    // Generate a unique filename for each image
                    $filename = 'Gallery_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    // Move the uploaded file to the public path
                    $file->move(public_path('Resources/Gallery/Photos'), $filename);
                    // Store the image path in the array
                    $imagePaths[] = $filename;
                }
            }
        
            // Create the 'Gallery' record
            $gallery = Gallery::create([
                'gallery_title' => $request->galleryTitle,
                'image_paths' => isset($imagePaths) ? json_encode($imagePaths) : null, // Store image paths as JSON
                'added_by' => Auth::user()->id,
            ]);
        
            if ($gallery) {
                return redirect()->back()->with('success', 'সফল ভাবে নতুন গ্যালারী যুক্ত করা হয়েছে');
            }
        }
    }

    public function delete_gallery($id){
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->status = 0;
            $gallery->update();
        
            return redirect()->back()->with('success', 'গ্যালারী কালেকশন টি সফল ভাবে সরিয়ে দেয়া হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }

}

