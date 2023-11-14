<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){
        $users = User::get();
        return view('backend.users.users', compact('users'));
    }

    public function edit_user($id){
        $user = User::find($id);
        return view('backend.users.edit_user', compact('user'));
    }

    public function update_user(Request $request, $id) {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'role' => 'required',
            'permission' => 'required'
        ], [
            'name.required' => "অবশ্যই আপনার নাম দিতে হবে",
            'name.max' => "এতবড় নাম গ্রহণযোগ্য নয়",
            'email.required' => "ইমেইল দেয়া বাধ্যতামূলক",
            'email.email' => "সঠিক ইমেইল দিতে হবে",
            'email.max' => "এতবড় ইমেইল গ্রহণযোগ্য নয়",
            'email.unique' => "ইমেইলটি ইতোমধ্যে ব্যাবহৃত",
        ]);
    
        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Find the user by ID
        $user = User::find($id);
    
        // Handle the case where the user is not found
        if (!$user) {
            return redirect()->route('backend.users')->with('error', 'ইউজার এর তথ্য পাওয়া যায়নি');
        }
    
        // Check if the logged-in user is attempting to edit their permission or role
        $loggedInUser = auth()->user();
        if ($loggedInUser && $loggedInUser->id == $id) {
            // Allow updating name and email, but not permission and role
            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            
            if ($user->update()) {
                return redirect()->route('backend.users')->with('success', 'আপনার তথ্য সফলভাবে আপডেট করেছেন, কিন্তু আপনি নিজের রোল এবং পারমিশন পরিবর্তন করতে পারবেন না।');
            } else {
                return redirect()->route('backend.users')->with('error', 'আপনার নিজের তথ্য আপডেট করা যায়নি');
            }
        }
    
        // If the user is being promoted to Super Admin
        if ($request->role == 2) {
            // Check if the logged-in user is the existing Super Admin
            if ($loggedInUser && $loggedInUser->role == 2) {
                // Demote the existing Super Admin to Admin
                $existingSuperAdmin = User::where('role', 2)->first();
    
                if ($existingSuperAdmin) {
                    $existingSuperAdmin->role = 1;
                    $existingSuperAdmin->update();
                }
            }
        }
    
        // Update user attributes
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->permission = $request->permission;
    
        // Save changes
        if ($user->update()) {
            return redirect()->route('backend.users')->with('success', 'ইউজার এর তথ্য সফলভাবে আপডেট করা হয়েছে');
        } else {
            return redirect()->route('backend.users')->with('error', 'ইউজার এর তথ্য আপডেট করা যায়নি');
        }
    }
    
    
    
}
