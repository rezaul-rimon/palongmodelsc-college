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

    public function store_quick_link(Request $request){
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

    public function delete_quick_link($id) {
        try {
            // Find the QuickLink by ID
            $quick_link = QuickLink::findOrFail($id);
    
            // Get the site logo file name
            $logo_file = $quick_link->site_logo;
    
            // If a logo file is associated with the quick link, delete it
            if ($logo_file) {
                $file_path = storage_path('app/public/Resources/QuickLink/Photos') . '/' . $logo_file;
    
                // Check if the file exists before attempting to delete
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
    
            // Delete the QuickLink from the database
            $quick_link->delete();
    
            // Redirect with success message
            return redirect()->route('backend.quick_link')->with('success', 'কুইক লিংকটি সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Log the error for debugging (you can customize this part)
            //Log::error('Error deleting QuickLink: ' . $e->getMessage());
    
            // Redirect with error message
            return redirect()->route('backend.quick_link')->with('error', 'দুঃখিত! কিছু একটা সমস্যা হয়েছে');
        }
    }

    public function edit_quick_link($id){
        $quick_link = QuickLink::find($id);
        return view('backend.quick_link.edit_quick_link', compact('quick_link'));
    }

    public function update_quick_link(Request $request, $id){
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

        $quickLink = QuickLink::find($id);

        if (!$quickLink) {
            return redirect()->route('backend.quick_link')
                ->with('error', 'কুইক লিংকটি পাওয়া যায়নি');
        }

        // Check if a file was uploaded
        if ($request->hasFile('siteLogo')) {
            $file = $request->file('siteLogo');
            $filename = 'QuickLink_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Store the file in the storage folder
            $filePath = $file->storeAs('public/Resources/QuickLink/Photos', $filename);

            // Delete the old file if it exists
            if ($quickLink->site_logo) {
                $oldFilePath = storage_path('app/public/Resources/QuickLink/Photos/') . $quickLink->site_logo;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $quickLink->site_logo = $filename;
        }

        // Update the 'QuickLink' record
        $quickLink->update([
            'site_name' => $request->siteName,
            'site_link' => $request->siteLink,
            'added_by' => Auth::user()->id,
        ]);

        return redirect()->route('backend.quick_link')
            ->with('success', 'সফল ভাবে কুইক লিংকটি আপডেট করা হয়েছে');
    }

    
}
