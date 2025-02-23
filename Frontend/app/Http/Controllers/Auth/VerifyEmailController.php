<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */

     public function showVerificationPage()
     {
         Log::info('Controller: Email verification page visited.');
 
         // Check session
         Log::info('Controller session data:', ['session' => session()->all()]);
 
         $user = User::find(session('unverified_user_id'));
 
         if (!$user) {
             Log::error('Controller: No user found in session.');
             return redirect()->route('signup')->with('error', 'Please sign up first.');
         }
 
         Log::info('Controller: User found', ['user_id' => $user->id]);
 
         return view('auth.verify-email', compact('user'));
     }

    public function verify(Request $request, $id, $hash): RedirectResponse
    {
        Log::info('Email verification request received.', ['id' => $id, 'hash' => $hash]);

        // Find user by ID
        $user = User::find($id);

        // Check if the hash matches
        if (sha1($user->getEmailForVerification()) !== $hash) {
            Log::error('Verification failed: Hash mismatch.', ['id' => $id]);
            return redirect()->route('verification.notice')->with('error', 'Invalid verification link.');
        }
        if ($user->verification_code !== $request->verification_code) {
            return redirect()->route('verification.notice')->with('error', 'Invalid verification code.');
        }
        // Mark email as verified
        $user->markEmailAsVerified();
        event(new Verified($user));

        Log::info('User email verified successfully.', ['user_id' => $user->id]);

        //Check if the user is already logged in
            if (!Auth::check()) {
                Auth::login($user); // Log the user in
            }

            // Redirect to setup-account page with user details
            return redirect()->route('setup-account')->with('message', 'Email already verified.');
    }
}
