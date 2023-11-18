<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Committee;

class CommitteeController extends Controller
{
    // Committee Management
    public function committee()
    {
        $committee = Committee::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.committee.committee', compact('committee'));
    }

    public function add_committee()
    {
        return view('backend.committee.add_committee');
    }

    public function store_committee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'committeeName' => 'required|string|min:5|max:50',
            'committeeDesignation' => 'required|string|min:5|max:100',
            'committeePhoto' => 'mimes:jpg,jpeg,png|max:5120',
        ], [
            'committeeName.required' => "অবশ্যই শিক্ষকের নাম দিতে হবে",
            'committeeName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'committeeName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",

            'committeeDesignation.required' => "অবশ্যই শিক্ষকের পদবী দিতে হবে",
            'committeeDesignation.min' => "এতছোট পদবী গ্রহণযোগ্য নয়",
            'committeeDesignation.max' => "এতবড় পদবী গ্রহণযোগ্য নয়",

            'committeePhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'committeePhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('committeePhoto')) {
                $file = $request->file('committeePhoto');
                $filename = 'Committee_Member_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Store the file in the storage folder
                $filePath = $file->storeAs('public/Resources/Committee/Photos', $filename);
            }

            // Create the 'Committee' record
            $committee = Committee::create([
                'committee_name' => $request->committeeName,
                'committee_designation' => $request->committeeDesignation,
                'added_by' => Auth::user()->id,
                'committee_photo' => isset($filename) ? $filename : null,
            ]);

            if ($committee) {
                return redirect()->route('backend.committee')->with('success', 'সফল ভাবে নতুন একজন কমিটি সদস্য যুক্ত করা হয়েছে');
            }
        }
    }

    public function edit_committee($id)
    {
        $committee = Committee::find($id);
        return view('backend.committee.edit_committee', compact('committee'));
    }

    public function update_committee(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'committeeName' => 'required|string|min:5|max:50',
            'committeeDesignation' => 'required|string|min:5|max:100',
            'committeePhoto' => 'mimes:jpg,jpeg,png|max:5120',
        ], [
            'committeeName.required' => "অবশ্যই কমিটির নাম দিতে হবে",
            'committeeName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'committeeName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",

            'committeeDesignation.required' => "অবশ্যই কমিটির পদবী দিতে হবে",
            'committeeDesignation.min' => "এতছোট পদবী গ্রহণযোগ্য নয়",
            'committeeDesignation.max' => "এতবড় পদবী গ্রহণযোগ্য নয়",

            'committeePhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'committeePhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $committee = Committee::findOrFail($id);

                $committee->committee_name = $request->committeeName;
                $committee->committee_designation = $request->committeeDesignation;

                // Check if a new file was uploaded
                if ($request->hasFile('committeePhoto')) {
                    $photo = $request->file('committeePhoto');
                    $filename = 'Committee_' . uniqid() . '.' . $photo->getClientOriginalExtension();

                    // Store the file in the storage folder
                    $filePath = $photo->storeAs('public/Resources/Committee/Photos', $filename);

                    // Delete the old file if it exists
                    if ($committee->committee_photo) {
                        Storage::delete('public/Resources/Committee/Photos/' . $committee->committee_photo);
                    }

                    $committee->committee_photo = $filename;
                }

                $committee->update();

                return redirect()->route('backend.committee')
                    ->with('success', 'সদস্যের তথ্য সফলভাবে আপডেট করা হয়েছে');
            } catch (\Exception $e) {
                return redirect()->route('backend.committee')
                    ->with('error', 'কিছু একটা সমস্যা হয়েছে');
            }
        }
    }

    public function delete_committee($id)
    {
        try {
            $committee = Committee::findOrFail($id);
            $committeePhoto = $committee->committee_photo;

            if ($committeePhoto) {
                // Delete the associated committee photo
                $photo_path = storage_path('app/public/Resources/Committee/Photos') . '/' . $committeePhoto;
                if (file_exists($photo_path)) {
                    unlink($photo_path);
                }
            }

            $committee->delete(); // Delete the committee from the database.

            return redirect()->route('backend.committee')->with('success', 'এই কমিটির ডেটা সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the committee not being found.
            return redirect()->back()->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
}
