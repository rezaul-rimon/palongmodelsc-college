<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\QuickLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class QuickLinkController extends Controller
{
    public function quick_link()
    {
        $quick_links = QuickLink::where('status', 1)->with('user')->get();
        //dd($quick_links);

        return view('backend.quick_link.quick_link', compact('quick_links'));
    }

    public function add_quick_link(){
        return view('backend.quick_link.add_quick_link');
    }

    public function store_quick_link(Request $request)
{
    $validator = Validator::make($request->all(), [
        'siteName' => 'required|string|min:5|max:50',
        'siteLink' => ['required', 'url', 'min:5', 'max:250'],
        'siteLogo' => 'mimes:jpg,jpeg,png|max:2048',
    ], [
        'siteName.required' => 'অবশ্যই সাইটের নাম দিতে হবে',
        'siteName.min' => 'এতছোট নাম গ্রহণযোগ্য নয়',
        'siteName.max' => 'এতবড় নাম গ্রহণযোগ্য নয়',

        'siteLink.required' => 'অবশ্যই সাইটের লিংক দিতে হবে',
        'siteLink.url' => 'দয়া করে সঠিক লিংক টি দিন',
        'siteLink.min' => 'দয়া করে সঠিক লিংক টি দিন',
        'siteLink.max' => 'এতবড় লিংক গ্রহণযোগ্য নয়',

        'siteLogo.mimes' => 'ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে',
        'siteLogo.max' => 'ছবির আকার 2-MB এর বেশি হতে পারবে না',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Check if a file was uploaded
    if ($request->hasFile('siteLogo')) {
        $file = $request->file('siteLogo');
        $filename = 'QuickLink_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file in the storage folder
        $filePath = $file->storeAs('public/Resources/QuickLink/Photos', $filename);
    }

    // Create the 'Event' record
    $quickLink = QuickLink::create([
        'site_name' => $request->siteName,
        'site_link' => $request->siteLink,
        'added_by' => Auth::user()->id,
        'site_logo' => isset($filename) ? $filename : null,
    ]);

    if ($quickLink) {
        return redirect()->route('backend.quick_link')->with('success', 'সফল ভাবে নতুন একটি কুইক লিংক যুক্ত করা হয়েছে');
    } else {
        return redirect()->route('backend.quick_link')->with('error', 'দুঃখিত! কুইক লিংকটি যুক্ত করা যায়নি');
    }
}

}
