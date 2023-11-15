<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\ContactUs;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\StipendStudents;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontEndController extends Controller
{
    public function index(){
        $committee = Committee::where('status', 1)->get();
        $students = Students::where('status', 1)->get();
        $stipend_students = StipendStudents::where('status', 1)->get();
        $notices = Notice::where('status', 1)->orderBy('id', 'desc')->get();
        
        $events = Event::where('status', 1)
            ->whereDate('event_date', '>=', now()) // Filter events with dates greater than or equal to today
            ->orderBy('event_date') // Order events by event date in ascending order
            ->get();

        //Class 6 to 8
        // $class_6_to_8 = Students::where('status', 1)
        //     ->whereIn('class_name', [6, 7, 8])
        //     ->get();
        
        $class_6 = [
            'male' => 0,
            'female' => 0,
        ];
        $class_7 = [
            'male' => 0,
            'female' => 0,
        ];
        $class_8 = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_sc = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_sc = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_com = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_com = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_ar = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_ar = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_comp = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_comp = [
            'male' => 0,
            'female' => 0,
        ];
        
        $class_9_cv = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_cv = [
            'male' => 0,
            'female' => 0,
        ];

        foreach ($students as $items) {
            if ($items->class_name == 6) {
                $class_6['male'] += $items->male_students;
                $class_6['female'] += $items->female_students;
            }
        
            if ($items->class_name == 7) {
                $class_7['male'] += $items->male_students;
                $class_7['female'] += $items->female_students;
            }
        
            if ($items->class_name == 8) {
                $class_8['male'] += $items->male_students;
                $class_8['female'] += $items->female_students;
            }

            if($items->class_name == 9){
                if($items->class_section == 'A'){
                    $class_9_sc['male'] += $items->male_students;
                    $class_9_sc['female'] += $items->female_students;
                }

                else if($items->class_section == 'B' or $items->class_section == 'C'){
                    $class_9_com['male'] += $items->male_students;
                    $class_9_com['female'] += $items->female_students;
                }

                else if($items->class_section == 'D'){
                    $class_9_ar['male'] += $items->male_students;
                    $class_9_ar['female'] += $items->female_students;
                }
                
                else if($items->class_section == 'Computer'){
                    $class_9_comp['male'] += $items->male_students;
                    $class_9_comp['female'] += $items->female_students;
                }

                else if($items->class_section == 'Civil'){
                    $class_9_cv['male'] += $items->male_students;
                    $class_9_cv['female'] += $items->female_students;
                }
            }

            if($items->class_name == 10){
                if($items->class_section == 'A'){
                    $class_10_sc['male'] += $items->male_students;
                    $class_10_sc['female'] += $items->female_students;
                }

                else if($items->class_section == 'B' or $items->class_section == 'C'){
                    $class_10_com['male'] += $items->male_students;
                    $class_10_com['female'] += $items->female_students;
                }

                else if($items->class_section == 'D'){
                    $class_10_ar['male'] += $items->male_students;
                    $class_10_ar['female'] += $items->female_students;
                }
                
                else if($items->class_section == 'Computer'){
                    $class_10_comp['male'] += $items->male_students;
                    $class_10_comp['female'] += $items->female_students;
                }

                else if($items->class_section == 'Civil'){
                    $class_10_cv['male'] += $items->male_students;
                    $class_10_cv['female'] += $items->female_students;
                }
            }
        }
        //dd($class_10_comp);
        //dd($class_6, $class_7, $class_8);

        $teachers = Teacher::where('status', 1)->get();
        //dd($teachers);
        
        $galleryItems = Gallery::where('status', 1)->get();
        
        $galleryItems->transform(function ($item) {
            $item->image_paths = json_decode($item->image_paths, true);
            return $item;
        });

        //dd($galleryItems);
        
        //dd($committee);
        return view('frontend.index', compact(
            'committee',
            'students',
            'stipend_students',
            'notices',
            'events',
            'class_6',
            'class_7',
            'class_8',
            'class_9_sc',
            'class_9_com',
            'class_9_ar',
            'class_9_comp',
            'class_9_cv',
            'class_10_sc',
            'class_10_com',
            'class_10_ar',
            'class_10_comp',
            'class_10_cv',
            'teachers',
            'galleryItems',
        ));
    }


    ////////
    public function teachers_page(){
        $teachers = Teacher::where('status', 1)->get();
        $banner_text = "শিক্ষক মন্ডলী";

        return view('frontend.teachers_page', compact('teachers', 'banner_text'));
    }

    public function notice_events_page(){
        $notices = Notice::where('status', 1)->orderBy('id', 'desc')->get();
        $events = Event::where('status', 1)
            ->whereDate('event_date', '>=', now()) // Filter events with dates greater than or equal to today
            ->orderBy('event_date') // Order events by event date in ascending order
            ->get();

            $banner_text = "নোটিশ এবং ইভেন্ট";

            return view('frontend.notice_and_events', compact('notices', 'events', 'banner_text'));
    }

    public function students_page(){
        $students = Students::where('status', 1)->get();
        $stipend_students = StipendStudents::where('status', 1)->get();
        $class_6 = [
            'male' => 0,
            'female' => 0,
        ];
        $class_7 = [
            'male' => 0,
            'female' => 0,
        ];
        $class_8 = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_sc = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_sc = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_com = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_com = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_ar = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_ar = [
            'male' => 0,
            'female' => 0,
        ];

        $class_9_comp = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_comp = [
            'male' => 0,
            'female' => 0,
        ];
        
        $class_9_cv = [
            'male' => 0,
            'female' => 0,
        ];

        $class_10_cv = [
            'male' => 0,
            'female' => 0,
        ];

        foreach ($students as $items) {
            if ($items->class_name == 6) {
                $class_6['male'] += $items->male_students;
                $class_6['female'] += $items->female_students;
            }
        
            if ($items->class_name == 7) {
                $class_7['male'] += $items->male_students;
                $class_7['female'] += $items->female_students;
            }
        
            if ($items->class_name == 8) {
                $class_8['male'] += $items->male_students;
                $class_8['female'] += $items->female_students;
            }

            if($items->class_name == 9){
                if($items->class_section == 'A'){
                    $class_9_sc['male'] += $items->male_students;
                    $class_9_sc['female'] += $items->female_students;
                }

                else if($items->class_section == 'B' or $items->class_section == 'C'){
                    $class_9_com['male'] += $items->male_students;
                    $class_9_com['female'] += $items->female_students;
                }

                else if($items->class_section == 'D'){
                    $class_9_ar['male'] += $items->male_students;
                    $class_9_ar['female'] += $items->female_students;
                }
                
                else if($items->class_section == 'Computer'){
                    $class_9_comp['male'] += $items->male_students;
                    $class_9_comp['female'] += $items->female_students;
                }

                else if($items->class_section == 'Civil'){
                    $class_9_cv['male'] += $items->male_students;
                    $class_9_cv['female'] += $items->female_students;
                }
            }

            if($items->class_name == 10){
                if($items->class_section == 'A'){
                    $class_10_sc['male'] += $items->male_students;
                    $class_10_sc['female'] += $items->female_students;
                }

                else if($items->class_section == 'B' or $items->class_section == 'C'){
                    $class_10_com['male'] += $items->male_students;
                    $class_10_com['female'] += $items->female_students;
                }

                else if($items->class_section == 'D'){
                    $class_10_ar['male'] += $items->male_students;
                    $class_10_ar['female'] += $items->female_students;
                }
                
                else if($items->class_section == 'Computer'){
                    $class_10_comp['male'] += $items->male_students;
                    $class_10_comp['female'] += $items->female_students;
                }

                else if($items->class_section == 'Civil'){
                    $class_10_cv['male'] += $items->male_students;
                    $class_10_cv['female'] += $items->female_students;
                }
            }
        }

        $banner_text = "ছাত্র ছাত্রীর তথ্য";

        return view('frontend.students_page', compact(
            'students',
            'stipend_students',
            'class_6',
            'class_7',
            'class_8',
            'class_9_sc',
            'class_9_com',
            'class_9_ar',
            'class_9_comp',
            'class_9_cv',
            'class_10_sc',
            'class_10_com',
            'class_10_ar',
            'class_10_comp',
            'class_10_cv',
            'banner_text',
        ));
    }

    public function about_us(){
        $committee = Committee::where('status', 1)->get();
        $banner_text = "আমাদের সম্পর্কে";

        return view('frontend.about_us', compact('committee', 'banner_text'));
    }

    public function gallery_page(){
        $galleryItems = Gallery::where('status', 1)->get();
        
        $galleryItems->transform(function ($item) {
            $item->image_paths = json_decode($item->image_paths, true);
            return $item;
        });

        $banner_text = "স্মৃতির পাতা";

        return view('frontend.gallery_page', compact('galleryItems', 'banner_text'));
    }

    public function contact_us(){
        $banner_text = "আমাদের সাথে যোগাযোগ";
        return view('frontend.contact_us', compact('banner_text'));
        
    }

    public function contact_store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|max:50',
            'subject' => 'required|string|min:5|max:250',
            'message' => 'required|string|min:10|max:500',
        ], [
            'name.required' => 'অবশ্যই নাম দিতে হবে',
            'name.min' => 'এতছোট নাম গ্রহণযোগ্য নয়',
            'name.max' => 'এতছোট নাম গ্রহণযোগ্য নয়',
    
            'email.required' => 'অবশ্যই ইমেইল দিতে হবে',
            'email.email' => 'ইমেইল সঠিক নয়',
            'email.max' => 'ইমেইল অবশ্যই ৫০ অক্ষরের মধ্যে হতে হবে',
    
            'subject.required' => 'অবশ্যই বিষয় দিতে হবে',
            'subject.string' => 'বিষয় অবশ্যই স্ট্রিং হতে হবে',
            'subject.min' => 'বিষয় অবশ্যই ৫ অক্ষরের বেশী হতে হবে',
            'subject.max' => 'বিষয় অবশ্যই ২৫০ অক্ষরের মধ্যে হতে হবে',
    
            'message.required' => 'অবশ্যই মেসেজ দিতে হবে',
            'message.string' => 'মেসেজ অবশ্যই স্ট্রিং হতে হবে',
            'message.min' => 'মেসেজ অবশ্যই ১০ অক্ষরের বেশী হতে হবে',
            'message.max' => 'মেসেজ অবশ্যই ৫০০ অক্ষরের মধ্যে হতে হবে',
        ]);
    
        // If validation fails, redirect back with errors and input
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Try to create a new ContactUs record
        try {
            ContactUs::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);
    
            // If successful, you can add a success message or redirect to a thank you page
            return redirect()->route('frontend.contact_us')->with('success', 'আপনার মেসেজ টি সফল ভাবে প্রদান করা হয়েছে, দয়া করে অপেক্ষা করুন আমরা আপনার সাথে যথা সম্ভব দ্রুত যোগাযোগ করবো!');
        } catch (\Exception $e) {
            // If an exception occurs (data insertion fails), flash an error message and redirect back
            return redirect()->route('frontend.contact_us')->with('error', 'দুঃখিত! আপনার মেসেজ টি প্রেরণ করা যায়নি')->withInput();
        }
    }
    
}
