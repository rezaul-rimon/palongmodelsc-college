<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Notice;

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

    public function notice(){
        return view('backend.notice');
    }

    public function add_notice(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'noticeType' => 'required|string|max:50',
            'noticeSummary' => 'required|string|max:100',
            'noticeFile' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'noticeType.required' => "অবশ্যই নোটিশ টাইপ দিতে হবে",
            'noticeType.max' => "এতবড় নোটিশ টাইপ গ্রহণযোগ্য নয়",
            'noticeSummary.required' => "অবশ্যই নোটিশ সারমর্ম দিতে হবে",
            'noticeSummary.max' => "এতবড় নোটিশ সারমর্ম গ্রহণযোগ্য নয়",
            'noticeFile.required' => "নোটিশ ফাইল দেয়া বাধ্যতামূলক",
            'noticeFile.mimes' => "নোটিশ ফাইল pdf, jpg, jpeg, png ফরম্যাটে হতে হবে",
            'noticeFile.max' => "নোটিশ ফাইলের আকার 2MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('noticeFile')) {
                $file = $request->file('noticeFile');
                // Generate a unique filename
                $filename = 'Notice' . '_' . uniqid() .  $file->getClientOriginalExtension();
                // Move the uploaded file to the public path
                $file->move(public_path('Resources/Notice/Files'), $filename);
            }
        
            // Create the 'Notice' record
            $notice = Notice::create([
                'notice_type' => $request->noticeType,
                'notice_summary' => $request->noticeSummary,
                'added_by' => Auth::user()->id,
                'notice_file' => isset($filename) ? $filename : null,
            ]);
        }
    }
    
}
