<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact_us(){
        $messages = ContactUs::where('status', 1)->orderBy('id', 'desc')->get();

        //dd($teacher);
        return view('backend.contact_us.contact_us', compact('messages'));
    }

    public function delete_contact_us($id){
        try {
            $message = ContactUs::findOrFail($id);

            $message->delete(); // Delete the teacher from the database.

            return redirect()->route('backend.contact_us')->with('success', 'এই মেসেজের ডেটা সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the teacher not being found.
            return redirect()->route('backend.contact_us')->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }
}
