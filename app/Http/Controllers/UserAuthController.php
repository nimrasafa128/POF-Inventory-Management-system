<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login'); // create resources/views/auth/login.blade.php
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'pl_no' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            if (Auth::user()->role === 'Developer') {
                return redirect()->route('documentation.show');
            } else {
                return redirect()->route('user.documentation.show');
            }
        }

        return back()->withErrors([
            'pl_no' => 'Invalid PL No or password.',
        ]);
    }

    // Logout
   public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('userdocumentation'); // 👈 this instead of 'login'
}

    // Optional: Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'pl_no' => 'required|string|unique:users,pl_no',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'role' => 'required|in:Admin,Developer',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create($validated);

        return redirect()->route('login')->with('success', 'User registered successfully.');
    }
}
