@extends('layouts.app')

@section('content')
<!-- signup area start  -->
<section class="signup-area">
         <div class="container">
            <div class="signup-area-wrapper d-flex justify-content-between align-items-center">
               <div class="signup-main">
                  <div class="signup-top">
                     <p class="subtitle text-end">Already have an account? <a href="{{ route('login') }}" class="d-inline-block text-decoration-underline">Sign in</a></p>
                     <h1 class="title fw-bold mb-3">We’ve got you. Every Step.</h1>
                     <p class="signup-desc">All the pieces of your world in one place. Organise, protect and pass on your legacy with PocketLedger.</p>
                  </div>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif
                  <form method="POST" action="{{ route('create') }}" class="signup-form">
                  @csrf
                     <div class="form-input-wrapper d-flex flex-column flex-sm-row">
                        <div class="form-input w-100">
                           <label for="f-name" class="d-inline-block fw-bold mb-1">First Name*</label>
                           <input type="text" id="f-name" class="input-field w-100" name="first_name" required>
                        </div>
                        <div class="form-input w-100">
                           <label for="l-name" class="d-inline-block fw-bold mb-1">Last Name*</label>
                           <input type="text" id="l-name" class="input-field w-100" name="last_name" required>
                        </div>
                     </div>
                     <div class="form-input w-100">
                        <label for="email" class="d-inline-block fw-bold mb-1">Email address*</label>
                        <input type="email" id="email" class="input-field w-100" name="email" required>
                     </div>
                     <div class="form-input-wrapper d-flex gap-0 flex-column flex-sm-row">
                        <div class="form-input country-select flex-shrink-0">
                           <label for="select-country" class="d-inline-block fw-bold mb-1" required>Select Country*</label>
                           @if (isset($countries) && $countries->isNotEmpty())
                           <select type="text" id="select-country" class="input-field w-100" name="country_code">
                           @foreach ($countries as $index => $country)
                              <option value="{{$country->id}}">{{$country->iso3}}</option>
                              @endforeach  
                           </select>
                           @endif
                        </div>
                        <div class="form-input w-100">
                           <label for="phone" class="d-inline-block fw-bold mb-1">Phone number*</label>
                           <input type="tel" id="phone" class="input-field w-100" name="phone_number" required>
                        </div>
                     </div>
                     <div class="form-input w-100">
                        <label for="password" class="d-inline-block fw-bold mb-1">Password*</label>
                        <input type="password" id="password" class="input-field w-100" name="password" required>
                     </div>
                     <div class="form-condition d-flex">
                        <input type="checkbox" id="agreement" class="flex-shrink-0" name="terms_and_conditions" value="1" required>
                        <label for="agreement" class="fw-medium">I have read and agree to PocketLedger <a href="#" class="text-decoration-underline">Terms and Conditions</a></label>
                     </div>
                     <div class="form-btn-wrapper d-flex align-items-center">
                        <button type="submit" class="form-btn signup-btn theme-btn big d-inline-block fw-bold">Sign up</button>
                        <button type="reset" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold">Cancel</button>
                     </div>
                  </form>
               </div>
               <div class="testimonial-slider-container flex-shrink-0">
                  <div class="testimonial-slider swiper">
                     <div class="testimonial-slider-wrapper swiper-wrapper">
                        <div class="testimonial swiper-slide">
                           <img class="profile-pic object-fit-cover" src="assets/img/profile-pic.png" alt="profile-pic">
                           <p class="testimonial-desc">PocketLedger's Will Services are truly top-notch. Their attention to detail and professionalism are unmatched. I highly recommend Apple for all your will planning needs.</p>
                           <h6 class="profile-name fw-bold mb-0">- Emily Johnson</h6>
                        </div>
                        <div class="testimonial swiper-slide">
                           <img class="profile-pic object-fit-cover" src="assets/img/profile-pic.png" alt="profile-pic">
                           <p class="testimonial-desc">PocketLedger's Will Services are truly top-notch. Their attention to detail and professionalism are unmatched. I highly recommend Apple for all your will planning needs.</p>
                           <h6 class="profile-name fw-bold mb-0">- Emily Johnson</h6>
                        </div>
                     </div>
                  </div>
               </div>
            </div>   
         </div>
      </section>
      <!-- signup area end  -->
      @endsection
