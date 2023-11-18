<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;

class EventController extends Controller
{
    public function event()
    {
        $event = Event::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.events.event', compact('event'));
    }

    public function add_event()
    {
        return view('backend.events.add_event');
    }

    public function store_event(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'eventName' => 'required|string|min:5|max:50',
            'eventDescription' => 'required|string|min:5|max:1200',
            'eventDate' => 'required|date|after:' . date('Y-m-d', strtotime('tomorrow')),
            'eventPhoto' => 'mimes:jpg,jpeg,png|max:5120',
        ], [
            'eventName.required' => "অবশ্যই ইভেন্টের নাম দিতে হবে",
            'eventName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'eventName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",

            'eventDescription.required' => "অবশ্যই ইভেন্টের বিস্তারিত দিতে হবে",
            'eventDescription.min' => "এতছোট ইভেন্ট বিস্তারিত গ্রহণযোগ্য নয়",
            'eventDescription.max' => "এতবড় ইভেন্ট বিস্তারিত গ্রহণযোগ্য নয়",

            'eventDate.required' => 'ইভেন্টের তারিখ দিতে হবে',
            'eventDate.date' => 'তারিখ টি সঠিক হতে হবে',
            'eventDate.after' => 'ইভেন্টের তারিখ আজ অতবা গত তারিখ হতে পারবে না',

            'eventPhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'eventPhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Check if a file was uploaded
            if ($request->hasFile('eventPhoto')) {
                $file = $request->file('eventPhoto');
                $filename = 'Event_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Store the file in the storage folder
                $filePath = $file->storeAs('public/Resources/Event/Photos', $filename);
            }

            // Create the 'Event' record
            $event = Event::create([
                'event_name' => $request->eventName,
                'event_description' => $request->eventDescription,
                'event_date' => $request->eventDate,
                'added_by' => Auth::user()->id,
                'event_photo' => isset($filename) ? $filename : null,
            ]);

            if ($event) {
                return redirect()->route('backend.event')->with('success', 'সফল ভাবে নতুন একটি ইভেন্ট যুক্ত করা হয়েছে');
            }
        }
    }

    public function edit_event($id)
    {
        $event = Event::find($id);
        return view('backend.events.edit_event', compact('event'));
    }

    public function update_event(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'eventName' => 'required|string|min:5|max:50',
            'eventDescription' => 'required|string|min:5|max:1200',
            'eventDate' => 'required|date|after:' . date('Y-m-d', strtotime('tomorrow')),
            'eventPhoto' => 'mimes:jpg,jpeg,png|max:5120',
        ], [
            'eventName.required' => "অবশ্যই ইভেন্টের নাম দিতে হবে",
            'eventName.min' => "এতছোট নাম গ্রহণযোগ্য নয়",
            'eventName.max' => "এতবড় নাম গ্রহণযোগ্য নয়",

            'eventDescription.required' => "অবশ্যই ইভেন্টের বিস্তারিত দিতে হবে",
            'eventDescription.min' => "এতছোট ইভেন্ট বিস্তারিত গ্রহণযোগ্য নয়",
            'eventDescription.max' => "এতবড় ইভেন্ট বিস্তারিত গ্রহণযোগ্য নয়",

            'eventDate.required' => 'ইভেন্টের তারিখ দিতে হবে',
            'eventDate.date' => 'তারিখ টি সঠিক হতে হবে',
            'eventDate.after' => 'ইভেন্টের তারিখ আজ অতবা গত তারিখ হতে পারবে না',

            'eventPhoto.mimes' => "ছবি অবশ্যই jpg, jpeg, png ফরম্যাটে হতে হবে",
            'eventPhoto.max' => "ছবির আকার 5-MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $event = Event::find($id);

            if (!$event) {
                return redirect()->back()
                    ->with('error', 'ইভেন্টের ডেটা পাওয়া যায়নি');
            }

            $event->event_name = $request->eventName;
            $event->event_description = $request->eventDescription;
            $event->event_date = $request->eventDate;
            $event->added_by = Auth::user()->id;

            if ($request->hasFile('eventPhoto')) {
                $photo = $request->file('eventPhoto');
                $filename = 'Event_' . uniqid() . '.' . $photo->getClientOriginalExtension();

                // Store the file in the storage folder
                $filePath = $photo->storeAs('public/Resources/Event/Photos', $filename);

                if ($event->event_photo) {
                    Storage::delete('public/Resources/Event/Photos/' . $event->event_photo);
                }

                $event->event_photo = $filename;
            }

            if ($event->update()) {
                return redirect()->route('backend.event')->with('success', 'ইভেন্টটি সফলভাবে আপডেট করা হয়েছে');
            } else {
                return redirect()->route('backend.event')->with('error', 'ইভেন্ট আপডেট করা যায়নি');
            }
        }
    }

    public function delete_event($id)
    {
        try {
            $event = Event::findOrFail($id);
            $eventPhoto = $event->event_photo;

            if ($eventPhoto) {
                // Delete the associated event file
                $photo_path = storage_path('app/public/Resources/Event/Photos') . '/' . $eventPhoto;
                if (file_exists($photo_path)) {
                    unlink($photo_path);
                }
            }

            $event->delete(); // Delete the event from the database.

            return redirect()->route('backend.event')->with('success', 'এই ইভেন্টের ডেটা সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the event not being found.
            return redirect()->route('backend.event')->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
    
}
