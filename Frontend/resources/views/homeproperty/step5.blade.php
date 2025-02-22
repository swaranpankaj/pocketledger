@extends('layouts.property')

@section('content')

     <!-- dashboard area start -->
     <section class="dashboard-area">
         <div class="container">
            <div class="myprofile-wrapper dashboard-area-wrapper mx-auto">
               <div class="myprofile-title dasboard-title">
                  <h4 class="fw-bold">Property & assets</h4>
                  <p class="mb-3 pb-1">Where do you live? You don't need to provide an address yet, just a basic idea of where you rest you head each night.</p>
               </div>
               <div class="steps-wrapper d-flex justify-content-between mb-3 pb-1">
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0"><img src="assets/img/icon/check-circle-complete.svg" alt="check circle" class="w-100 h-100"></span>
                     <h6 class="fw-bold mb-0">Basic Info</h6>
                  </div>
                  <span class="step-divider w-100 d-block mt-3"></span>
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0"><img src="assets/img/icon/check-circle-complete.svg" alt="check-circle"></span>
                     <h6 class="fw-bold mb-0">Ownership</h6>
                  </div>
                  <span class="step-divider w-100 d-block mt-3"></span>
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0"><img src="assets/img/icon/check-circle-complete.svg" alt="check-circle"></span>
                     <h6 class="fw-bold mb-0">Insurance</h6>
                  </div>
                  <span class="step-divider w-100 d-block mt-3"></span>
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0">
                        <img src="assets/img/icon/check-circle-running.svg" alt="check-circle">
                     </span>
                     <h6 class="fw-bold mb-0">Security</h6>
                  </div>
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
               <form method="POST" class="property-add-step-box-5 p-3" action="{{ route('submitHomeProperty') }}">
               @csrf
                  <div class="form-input w-100">
                     <label for="name-of-sc" class="d-inline-block fw-bold mb-1">Name of security company</label>
                     <input type="text" id="name-of-sc" class="input-field w-100" name="security_company_name" value="{{ session('step4.policy_number', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="ac-number" class="d-inline-block fw-bold mb-1">Account number</label>
                     <input type="text" id="ac-number" class="input-field w-100" name="account_number" value="{{ session('step4.policy_number', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="phone" class="d-inline-block fw-bold mb-1">Phone safe-word</label>
                     <input type="text" id="phone" class="input-field w-100" name="phone_safe_word" value="{{ session('step4.policy_number', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="extra-key" class="d-inline-block fw-bold mb-1">Where do you keep extra keys?</label>
                     <input type="text" id="extra-key" class="input-field w-100" name="extra_keys_location" value="{{ session('step4.policy_number', '') }}">
                  </div>
                  <div class="form-btn-wrapper d-flex align-items-center justify-content-between my-3 py-1">
                     <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="submit" class="form-btn signup-btn theme-btn d-inline-block fw-bold">Save your property</button>
                        <a href="{{route('step4')}}" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Back to Insurance</a>
                     </div>
                     <a href="{{route('home-property')}}" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Cancel</a>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection