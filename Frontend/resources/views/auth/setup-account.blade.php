
@extends('layouts.app')

@section('content')
 <!-- setup-account area start  -->
 <section class="setup-account signup-area confirmation-area">
         <div class="container">
            <div class="signup-area-wrapper">
               <div class="signup-main">
                  <div class="signup-top">
                     <h2 class="title fw-bold mb-3">Let's finish setting up your account</h2>
                     <p class="confirmation-desc signup-desc pe-0">We've sent an email to <a href="mailto:{{$user->email}}" class="fw-bold text-black">{{$user->email}}</a> to confirm your account. If you don't receive the email within a couple minutes, please check the spam folder in your email program. The subject line of the email is "Confirmation instructions."</p>
                  </div>
                  <form action="{{route('account.complete')}}" method="POST" class="account-form setup-form">
                  @csrf
                     <div class="form-input-wrapper d-flex flex-column flex-sm-row">
                        <div class="form-input w-100">
                           <label for="f-name" class="d-inline-block fw-bold mb-1">First Name*</label>
                           <input type="text" id="f-name" class="input-field w-100" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                        </div>
                        <div class="form-input w-100">
                           <label for="l-name" class="d-inline-block fw-bold mb-1">Last Name*</label>
                           <input type="text" id="l-name" class="input-field w-100" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                        </div>
                     </div>
                     <div class="form-input w-100">
                        <label for="email" class="d-inline-block fw-bold mb-1">Email address*</label>
                        <input type="email" id="email" class="input-field w-100" value="{{$user->email}}" disabled>
                     </div>
                     <div class="form-input gender-select">
                        <label for="select-country" class="d-inline-block fw-bold mb-1" required>Choose one*</label>
                        <select type="text" id="select-country" class="input-field w-100" name="gender">
                           <option value="1">Male</option>
                           <option value="2" selected>Female</option>
                        </select>
                        <p class="mb-0 mt-1">Why do we ask for this information?</p>
                     </div>
                     <div class="form-btn-wrapper pt-4">
                        <button type="submit" class="form-btn signup-btn theme-btn big d-inline-block fw-bold">Continue</button>
                     </div>
                  </form>
               </div>
            </div>   
         </div>
      </section>
      <!-- setup-account area end  -->
      @endsection