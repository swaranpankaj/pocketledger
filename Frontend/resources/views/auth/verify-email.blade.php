
@extends('layouts.app')

@section('content')<!-- signup area start  -->
<section class="confirmation-area signup-area">
         <div class="container">
            <div class="signup-area-wrapper">
               <div class="signup-main">
                  <div class="signup-top">
                     <h1 class="title fw-bold mb-3">Welcome {{ old('first_name') }} . Please check your email.</h1>
                     <p class="confirmation-desc signup-desc pe-0">We've sent an email to <a href="mailto:{{ old('email') }}" class="fw-bold text-black">{{ old('email') }}</a> to confirm your account. If you don't receive the email within a couple minutes, please check the spam folder in your email program. The subject line of the email is "Confirmation instructions."</p>
                  </div>
                            <form action="{{ route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]) }}" method="POST" class="signup-form">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            
                            <div class="confirmation-code form-input w-100">
                                <label for="confirmation" class="d-inline-block fw-bold mb-1">Confirmation code*</label>
                                <input type="text" id="confirmation" class="input-field w-100" name="verification_code" required>
                            </div>
                            
                            <div class="form-btn-wrapper">
                                <button type="submit" class="form-btn signup-btn theme-btn big d-inline-block fw-bold">
                                    Confirm & Continue
                                </button>
                            </div>
                        </form>

                     
                     <form method="POST" action="{{ route('verification.send') }}">
                     @csrf
                     <p class="recieve-msg mb-0">If you have not received the email. 
                     <button type="submit" class="text-decoration-underline" style="background: none;border: none;color: blue;">Please click here to resend.</button>
                     </form>
                    </p>
                
               </div>
            </div>   
         </div>
      </section>
      <!-- signup area end  -->
      @endsection