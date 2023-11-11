<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Event;
use App\Models\Notice;
use App\Models\StipendStudents;
use App\Models\Students;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Http\Request;

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
        ));
    }
}
