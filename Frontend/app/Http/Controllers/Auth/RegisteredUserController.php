<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupEmail;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendSignUpEmailJob;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $countries=Country::get();
        return view('auth.register',compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    try {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'max:10', 'regex:/^\d{10}$/'],
            'terms_and_conditions' => ['required', 'accepted'],
        ]);

        $verificationCode = rand(100000, 999999); // Generate a random 6-digit code
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country_code' => $request->country_code,
            'phone_number' => $request->phone_number,
            'terms_and_conditions' => $request->terms_and_conditions,
            'status' => 1,
            'source_signup' => 'web',
            'ip_address' => request()->ip(),
            'role' => 'user',
            'verification_code' => $verificationCode, // Store in database
        ]);

        Log::info('User created successfully:', ['user_id' => $user->id]);

        // Ensure user is logged in after registration
        // Store user ID in session instead of logging in
        session(['unverified_user_id' => $user->id]);
        Log::info('Session stored:', ['unverified_user_id' => session('unverified_user_id')]);

        event(new Registered($user));
        $user->sendEmailVerificationNotification();
        $emailSent = dispatch(new SendSignUpEmailJob($user->id));

        if ($emailSent) {
            Log::info('Email sent successfully to: ' . $user->email);
            return redirect()->route('verification.notice')->with('success', 'User registered successfully!');
        } else {
            Log::error('Email failed to send.');
            return redirect()->route('signup')->with('error', 'An error occurred. Please try again.');
        }

    } catch (Exception $e) {
        Log::error('Email Error: ' . $e->getMessage());
        return redirect()->route('signup')->with('error', 'Email sending failed: ' . $e->getMessage());
    }
}

    
}
