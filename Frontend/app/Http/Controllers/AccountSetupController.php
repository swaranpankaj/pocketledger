<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSetupController extends Controller
{
    /**
     * Show the account setup page.
     */
    public function showSetupAccount(Request $request)
    {
        // Retrieve authenticated user
        $user = Auth::user();

        // If no user is logged in, redirect to login page
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        return view('auth.setup-account', compact('user'));
    }

    public function completeAccountSetup(Request $request)
    {
        $user = Auth::user(); // Get authenticated user

        // Update user details
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Account setup complete!');
    }
}