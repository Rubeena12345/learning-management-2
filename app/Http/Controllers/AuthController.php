<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.registration');
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:100",
            "role" => "",
            "email" => "required|email|max:150",
            "password" => "required|confirmed|min:6",
        ]);
        $user = User::create([
            "name" => $request->name,
            "role" => $request->role,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect()->route('auth.dashboard')->with('success', 'User registered successfully');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|max:150",
            "password" => "required",
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'User logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
