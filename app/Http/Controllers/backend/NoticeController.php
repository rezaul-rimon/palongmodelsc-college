<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Notice;

class NoticeController extends Controller
{
    // Notice Management
    public function notice()
    {
        $notice = Notice::where('status', 1)
            ->with('user')
            ->get();

        return view('backend.notice.notice', compact('notice'));
    }

    public function add_notice()
    {
        return view('backend.notice.add_notice');
    }

    public function store_notice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'noticeType' => 'required|string|min:5|max:100',
            'noticeSummary' => 'required|string|min:10|max:255',
            'noticeFile' => 'required|mimes:pdf,jpg,jpeg,png|max:5120',
        ], [
            'noticeType.required' => "অবশ্যই নোটিশ টাইপ দিতে হবে",
            'noticeType.min' => "এতছোট নোটিশ টাইপ গ্রহণযোগ্য নয়",
            'noticeType.max' => "এতবড় নোটিশ টাইপ গ্রহণযোগ্য নয়",

            'noticeSummary.required' => "অবশ্যই নোটিশ সারমর্ম দিতে হবে",
            'noticeSummary.min' => "এতছোট নোটিশ সারমর্ম গ্রহণযোগ্য নয়",
            'noticeSummary.max' => "এতবড় নোটিশ সারমর্ম গ্রহণযোগ্য নয়",

            'noticeFile.required' => "নোটিশ ফাইল দেয়া বাধ্যতামূলক",
            'noticeFile.mimes' => "নোটিশ ফাইল pdf, jpg, jpeg, png ফরম্যাটে হতে হবে",
            'noticeFile.max' => "নোটিশ ফাইলের আকার 5MB এর বেশি হতে পারবে না",
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
                $filename = 'Notice' . '_' . uniqid() . '.' .  $file->getClientOriginalExtension();
                // Store the uploaded file
                $file->storeAs('public/Resources/Notice/Files', $filename);
            }

            // Create the 'Notice' record
            $notice = Notice::create([
                'notice_type' => $request->noticeType,
                'notice_summary' => $request->noticeSummary,
                'added_by' => Auth::user()->id,
                'notice_file' => isset($filename) ? $filename : null,
            ]);

            if ($notice) {
                return redirect()->route('backend.notice')->with('success', 'সফল ভাবে নতুন একটি নোটিশ যুক্ত করা হয়েছে');
            }
        }
    }

    public function delete_notice($id)
    {
        try {
            $notice = Notice::findOrFail($id);
            $noticeFile = $notice->notice_file;

            if ($noticeFile) {
                // Delete the associated notice file
                $file_path = storage_path('app/public/Resources/Notice/Files') . '/' . $noticeFile;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            $notice->delete(); // Delete the notice from the database.

            return redirect()->route('backend.notice')->with('success', 'নোটিশটি সম্পূর্ণরূপে মুছে ফেলা হয়েছে');
        } catch (\Exception $e) {
            // Handle any errors, such as the notice not being found.
            return redirect()->route('backend.notice')->with('error', 'কিছু একটা সমস্যা হয়েছে');
        }
    }

    public function edit_notice($id)
    {
        $notice = Notice::find($id);
        return view('backend.notice.edit_notice', compact('notice'));
    }

    public function update_notice(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'noticeType' => 'required|string|min:5|max:100',
            'noticeSummary' => 'required|string|min:10|max:255',
            'noticeFile' => 'mimes:pdf,jpg,jpeg,png|max:5120',
        ], [
            'noticeType.required' => "অবশ্যই নোটিশ টাইপ দিতে হবে",
            'noticeType.min' => "এতছোট নোটিশ টাইপ গ্রহণযোগ্য নয়",
            'noticeType.max' => "এতবড় নোটিশ টাইপ গ্রহণযোগ্য নয়",

            'noticeSummary.required' => "অবশ্যই নোটিশ সারমর্ম দিতে হবে",
            'noticeSummary.min' => "এতছোট নোটিশ সারমর্ম গ্রহণযোগ্য নয়",
            'noticeSummary.max' => "এতবড় নোটিশ সারমর্ম গ্রহণযোগ্য নয়",

            'noticeFile.mimes' => "নোটিশ ফাইল pdf, jpg, jpeg, png ফরম্যাটে হতে হবে",
            'noticeFile.max' => "নোটিশ ফাইলের আকার 5MB এর বেশি হতে পারবে না",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            // Find the 'Notice' record to update
            $notice = Notice::find($id);

            if (!$notice) {
                return redirect()->route('backend.notice')
                    ->with('error', 'নোটিশ পাওয়া যায়নি');
            }

            $notice->notice_type = $request->noticeType;
            $notice->notice_summary = $request->noticeSummary;
            $notice->added_by = Auth::user()->id;

            // Check if a new file was uploaded
            if ($request->hasFile('noticeFile')) {
                $file = $request->file('noticeFile');
                $filename = 'Notice' . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                // Store the uploaded file
                $file->storeAs('public/Resources/Notice/Files', $filename);

                // Delete the old file if it exists
                if ($notice->notice_file) {
                    $oldFilePath = storage_path('app/public/Resources/Notice/Files/' . $notice->notice_file);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $notice->notice_file = $filename;
            }

            if ($notice->save()) {
                return redirect()->route('backend.notice')
                    ->with('success', 'নোটিশটি সফল ভাবে আপডেট করা হয়েছে');
            } else {
                return redirect()->route('backend.notice')
                    ->with('error', 'নোটিশ আপডেট করা যায়নি');
            }
        }
    }
}
