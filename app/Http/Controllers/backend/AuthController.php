<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule; 

class AuthController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    //view registration form
    public function registration(){
        return view('backend.auth.registration');
    }

    //Apply Registration Process
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:8|confirmed',
        ],
        [
            'name.required' => "অবশ্যই আপনার নাম দিতে হবে",
            'name.max' => "এতবড় নাম গ্রহণযোগ্য নয়",
            'email.required' => "ইমেইল দেয়া বাধ্যতামূলক",
            'email.email' => "সঠিক ইমেইল দিতে হবে",
            'email.max' => "এতবড় ইমেইল গ্রহণযোগ্য নয়",
            'email.unique' => "ইমেইলটি ইতোমধ্যে ব্যাবহৃত",
            'password.required' => "পাসওয়ার্ড দেয়া বাধ্যতামূলক",
            'password.min' => "পাসওয়ার্ড কমপক্ষে ৮ সংখ্যার হতে হবে",
            'password.confirmed' => "পাসওয়ার্ডটি কনফার্ম পাসওয়ার্ডের সাথ মিলতে হবে"
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        // Authenticate the user and redirect
        Auth::attempt($validator->validated());
        $request->session()->regenerate();
    
        return redirect()->route('backend.index')
            ->withSuccess('You have successfully registered and logged in!');
    }

    //View Login Page
    public function login(){
        return view('backend.auth.login');
    }

    //Attempt to log in Process
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember', true);
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('backend.index')->withSuccess('You have successfully logged in!');
        }
    
        return back()->withErrors([
            'email' => 'Your provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    //View Dashboard
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

    //Logout Process
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    } 
}
