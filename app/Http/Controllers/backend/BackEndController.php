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

    //Gallery Management
    public function gallery(){
        //dd($gallery);
        $gallery = Gallery::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.gallery', compact('gallery'));
    }

    public function add_gallery(Request $request) {
        $validator = Validator::make($request->all(), [
            'galleryTitle' => 'required|string|min:5|max:100',
            'galleryPhotos' => 'required|array',
            'galleryPhotos.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'galleryTitle.required' => "অবশ্যই গ্যালারীর নাম দিতে হবে",
            'galleryTitle.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'galleryTitle.max' => "এতবড় নাম গ্রহণযোগ্য নয়",
        
            'galleryPhotos.required' => "অবশ্যই ছবি দিতে হবে",
            'galleryPhotos.array' => "ছবি সমূহ অবশ্যই একটি স্পষ্ট তালিকা হতে হবে",
        
            'galleryPhotos.*.image' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'galleryPhotos.*.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'galleryPhotos.*.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);
        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if files were uploaded
            if ($request->hasFile('galleryPhotos')) {
                $imagePaths = [];
        
                foreach ($request->file('galleryPhotos') as $file) {
                    // Generate a unique filename for each image
                    $filename = 'Gallery_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    // Move the uploaded file to the public path
                    $file->move(public_path('Resources/Gallery/Photos'), $filename);
                    // Store the image path in the array
                    $imagePaths[] = $filename;
                }
            }
        
            // Create the 'Gallery' record
            $gallery = Gallery::create([
                'gallery_title' => $request->galleryTitle,
                'image_paths' => isset($imagePaths) ? json_encode($imagePaths) : null, // Store image paths as JSON
                'added_by' => Auth::user()->id,
            ]);
        
            if ($gallery) {
                return redirect()->back()->with('success', 'সফল ভাবে নতুন গ্যালারী যুক্ত করা হয়েছে');
            }
        }
    }

    public function delete_gallery($id){
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->status = 0;
            $gallery->update();
        
            return redirect()->back()->with('success', 'গ্যালারী কালেকশন টি সফল ভাবে সরিয়ে দেয়া হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }

}

