<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuickLinkController extends Controller
{
    public function quick_link()
    {
        
        return view('backend.notice.notice', compact('notice'));
    }
}
