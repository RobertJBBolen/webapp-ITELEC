<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Render the page
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Process the form data
    public function register(Request $request)
    {
        // 1. Validate user inputs
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8|confirmed', // looks for password_confirmation
        ]);

        // 2. Combine names and create user in DB
        $user = User::create([
            'name'     => $request->first_name . ' ' . $request->last_name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Safe encryption
        ]);

        // 3. Log the user in instantly
        Auth::login($user);

        // 4. Redirect to home/dashboard
        return redirect('/home')->with('success', 'Account created successfully!');
    }
}
