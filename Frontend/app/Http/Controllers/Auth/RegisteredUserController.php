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
        try{
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
                'phone_number' => ['required', 'string', 'max:10', 'regex:/^\d{10}$/'],
                'terms_and_conditions' => ['required', 'accepted'],
            ]);
    
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'country_code'=>$request->country_code,
                'phone_number'=>$request->phone_number,
                'terms_and_conditions'=>$request->terms_and_conditions,
                'status'=>1,
                'source_signup'=>'web',
                'ip_address'=>'127.0.0.1:8000',
                'role'=>'user'
            ]);
    
            event(new Registered($user));
    
            return Redirect::route('signin')->with('success', 'User registered successfully!');
        }catch(Exception $e){
            Log::error('Registration Error: ' . $e->getMessage());
           return Redirect::route('signup')->with('error', 'An error occurred. Please try again.');
        }
        
    }
}
