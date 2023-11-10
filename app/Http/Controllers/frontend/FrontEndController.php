<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
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
        //dd($committee);
        return view('frontend.index', compact('committee', 'students', 'stipend_students', 'notices'));
    }
}
