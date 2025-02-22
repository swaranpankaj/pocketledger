@extends('layouts.app')

@section('content')

      <!-- signup area start  -->
      <section class="signup-area">
         <div class="container">
            <div class="signup-area-wrapper d-flex justify-content-between align-items-center">
               <div class="signup-main">
                  <div class="signup-top">
                     <p class="subtitle text-end">Don't have an account? <a href="{{ route('signup') }}" class="d-inline-block text-decoration-underline">Sign Up</a></p>
                     <h1 class="title fw-bold mb-3">PocketLedger simplifies your life.</h1>
                     <p class="signup-desc pe-0">Bring all aspects of your life together in one place. With PocketLedger, you can organize, protect, and pass on your legacy effortlessly.</p>
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
                  <form method="POST" action="{{ route('signin') }}" class="signup-form login-form">
                  @csrf
                     <div class="form-input w-100">
                        <label for="email" class="d-inline-block fw-bold mb-1">Email address*</label>
                        <input type="email" id="email" class="input-field w-100" name="email" required>
                     </div>
                     <div class="form-input w-100 mb-0">
                        <label for="password" class="d-inline-block fw-bold mb-1">Password*</label>
                        <input type="password" id="password" class="input-field w-100" name="password" required>
                     </div>
                     <div class="form-btn-wrapper d-flex align-items-center">
                        <button type="submit" class="form-btn signup-btn theme-btn big d-inline-block fw-bold">Sign up</button>
                        <button type="reset" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold">Cancel</button>
                     </div>
                     <a href="#" class="forgot-pass text-decoration-underline">Forgot your password</a>
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
