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
        return view('backend.index');
    }
}

