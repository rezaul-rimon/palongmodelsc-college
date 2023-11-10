<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Event;
use App\Models\Notice;
use App\Models\StipendStudents;
use App\Models\Students;
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

        //dd($committee);
        return view('frontend.index', compact('committee', 'students', 'stipend_students', 'notices', 'events'));
    }
}
