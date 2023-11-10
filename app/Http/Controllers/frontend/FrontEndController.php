<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\StipendStudents;
use App\Models\Students;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $committee = Committee::where('status', 1)->get();
        $students = Students::where('status', 1)->get();
        $stipend_students = StipendStudents::where('status', 1)->get();
        //dd($committee);
        return view('frontend.index', compact('committee', 'students', 'stipend_students'));
    }
}
