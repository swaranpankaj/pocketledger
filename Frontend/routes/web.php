<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePropertyController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\PersonalInfoIDController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\AccountSetupController;

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : view('auth.login');
});


Route::get('/signup', [RegisteredUserController::class, 'create'])->name('signup'); 
Route::post('/create', [RegisteredUserController::class, 'store'])->name('create');


// Show the email verification prompt if user is not verified
Route::get('/verify-email', [VerifyEmailController::class, 'showVerificationPage'])->middleware(['EnsureEmailIsNotVerified'])->name('verification.notice');

// Handle email verification via link
Route::post('/verify-email/{id}/{hash}', [VerifyEmailController::class,'verify'])->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['throttle:6,1'])
    ->name('verification.send'); 

Route::get('/signin', [AuthenticatedSessionController::class, 'create'])->name('signin'); 
Route::post('/signin', [AuthenticatedSessionController::class, 'store'])->name('signin'); 
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::middleware(['auth','user','verified'])->group(function () {
 
    Route::get('/setup-account', [AccountSetupController::class, 'showSetupAccount'])->name('setup-account');
    Route::post('/account/complete', [AccountSetupController::class, 'completeAccountSetup'])->name('account.complete');

   //dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'create'])->name('dashboard');

    //home property routes
    Route::get('/home-property', [HomePropertyController::class, 'homeProperty'])->name('home-property');
    Route::get('/home-property-2', [HomePropertyController::class, 'homepropertyassets'])->name('home-property-2');
    Route::get('/view-step-1', [HomePropertyController::class, 'stepOne'])->name('step1');
    Route::get('/view-step-2', [HomePropertyController::class, 'stepTwo'])->name('step2');
    Route::post('/add-step-2', [HomePropertyController::class, 'addStep2'])->name('addStep2');
    Route::get('/view-step-3', [HomePropertyController::class, 'stepThree'])->name('step3');
    Route::post('/add-step-3', [HomePropertyController::class, 'addStep3'])->name('addStep3');
    Route::get('/view-step-4', [HomePropertyController::class, 'stepFour'])->name('step4');
    Route::post('/add-step-4', [HomePropertyController::class, 'addStep4'])->name('addStep4');
    Route::get('/view-step-5', [HomePropertyController::class, 'stepFive'])->name('step5');
    Route::get('/get-states/{country_id}', [HomePropertyController::class, 'getStates']);
    Route::post('/submit-home-property', [HomePropertyController::class, 'submitHomeProperty'])->name('submitHomeProperty');


    //onboarding routes
    Route::post('/submit-questions', [OnboardingController::class, 'submitQuestion'])->name('submitQuestion');

    //nominee routes
    Route::post('/submit-nominees', [OnboardingController::class, 'submitNominee'])->name('submitNominee');
    
    //user profile routes
    Route::post('/submit-verification', [OnboardingController::class, 'submitVerification'])->name('submitVerification');

    //personal information and ids
    Route::get('/personal-info', [PersonalInfoIDController::class, 'show'])->name('personalInformation');
    Route::post('/submit-personal-info', [PersonalInfoIDController::class, 'submitPersonalInfoID'])->name('submitPersonalInfoID');
    Route::get('/personal-info/view', [PersonalInfoIDController::class, 'viewPersonalInfoID'])->name('viewPersonalInfoID');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

