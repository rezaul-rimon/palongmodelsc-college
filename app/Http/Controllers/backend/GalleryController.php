<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function gallery()
    {
        $gallery = Gallery::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.gallery.gallery', compact('gallery'));
    }

    public function add_gallery()
    {
        return view('backend.gallery.add_gallery');
    }

    public function store_gallery(Request $request)
    {
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
            if ($request->hasFile('galleryPhotos')) {
                $imagePaths = [];

                foreach ($request->file('galleryPhotos') as $file) {
                    $filename = 'Gallery_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/Resources/Gallery/Photos', $filename);
                    $imagePaths[] = $filename;
                }
            }

            $gallery = Gallery::create([
                'gallery_title' => $request->galleryTitle,
                'image_paths' => isset($imagePaths) ? json_encode($imagePaths) : null,
                'added_by' => Auth::user()->id,
            ]);

            if ($gallery) {
                return redirect()->route('backend.gallery')->with('success', 'সফল ভাবে নতুন গ্যালারী যুক্ত করা হয়েছে');
            }
        }
    }

    public function delete_gallery($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $imagePaths = json_decode($gallery->image_paths, true);

            if (is_array($imagePaths)) {
                foreach ($imagePaths as $imagePath) {
                    $photoPath = public_path('Resources/Gallery/Photos/' . $imagePath);
                    if (File::exists($photoPath)) {
                        File::delete($photoPath);
                    }
                }
            }

            $gallery->delete();

            return redirect()->route('backend.gallery')->with('success', 'গ্যালারীটি সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            return redirect()->route('backend.gallery')->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
}
