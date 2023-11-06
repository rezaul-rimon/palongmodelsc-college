<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function gallery(){
        //dd($gallery);
        $gallery = Gallery::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.gallery.gallery', compact('gallery'));
    }

    public function add_gallery(){
        return view('backend.gallery.add_gallery');
    }

    public function store_gallery(Request $request) {
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
                return redirect()->route('backend.gallery')->with('success', 'সফল ভাবে নতুন গ্যালারী যুক্ত করা হয়েছে');
            }
        }
    }

    public function delete_gallery($id) {
        try {
            $gallery = Gallery::findOrFail($id);
            $imagePaths = json_decode($gallery->image_paths, true);
    
            // Delete the associated gallery photos
            if (is_array($imagePaths)) {
                foreach ($imagePaths as $imagePath) {
                    $photoPath = public_path('Resources/Gallery/Photos/' . $imagePath);
                    if (file_exists($photoPath)) {
                        unlink($photoPath);
                    }
                }
            }
    
            $gallery->delete(); // Delete the gallery record from the database.
    
            return redirect()->route('backend.gallery')->with('success', 'গ্যালারীটি সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the gallery not being found.
            return redirect()->route('backend.gallery')->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
    

    // public function delete_gallery($id){
    //     try {
    //         $gallery = Gallery::findOrFail($id);
    //         $gallery->status = 0;
    //         $gallery->update();
        
    //         return redirect()->back()->with('success', 'গ্যালারী কালেকশন টি সফল ভাবে সরিয়ে দেয়া হয়েছে');
    //     } catch (\Exception $e) {
    //         // Handle any errors, such as the notice not being found.
    //         return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
    //     }
    // }
}
