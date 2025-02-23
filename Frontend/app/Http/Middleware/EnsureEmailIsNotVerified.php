<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class EnsureEmailIsNotVerified
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Middleware executed');

        // Check session data
        $unverifiedUserId = session('unverified_user_id');
        Log::info('Middleware session data:', ['unverified_user_id' => $unverifiedUserId]);

        // If no session data, redirect to sign-up
        if (!$unverifiedUserId) {
            Log::error('No unverified user found in session.');
            return redirect()->route('signup')->with('error', 'Please sign up first.');
        }

        $user = User::find($unverifiedUserId);

        if (!$user) {
            Log::error('User not found in database.');
            return redirect()->route('signup')->with('error', 'User does not exist.');
        }

        Log::info('Middleware: User found', ['user_id' => $user->id]);

        // If user is already verified, redirect to dashboard
        if ($user->hasVerifiedEmail()) {
            Log::warning('Middleware: User already verified, redirecting to dashboard', ['user_id' => $user->id]);
            return redirect()->route('dashboard')->with('message', 'You are already verified.');
        }

        return $next($request);
    }
}



