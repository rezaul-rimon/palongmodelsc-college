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
}
