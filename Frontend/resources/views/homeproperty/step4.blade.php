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
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0"><img src="assets/img/icon/check-circle-running.svg" alt="check-circle"></span>
                     <h6 class="fw-bold mb-0">Insurance</h6>
                  </div>
                  <span class="step-divider w-100 d-block mt-3"></span>
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white"></span>
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
               <form method="POST" class="property-add-step-box-4 p-3" action="{{route('addStep4')}}">
               @csrf
                  <div class="form-input w-100">
                     <label for="name-of-ic" class="d-inline-block fw-bold mb-1">Name of insurance company</label>
                     <input type="text" id="name-of-ic" class="input-field w-100" name="insurance_company_name" value="{{ session('step3.insurance_company_name', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="insurance-account" class="d-inline-block fw-bold mb-1">Insurance account or policy number</label>
                     <input type="text" id="insurance-account" class="input-field w-100" name="policy_number" value="{{ session('step3.policy_number', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="document" class="d-inline-block fw-bold mb-1">Where do you keep the original policy documents?</label>
                     <input type="text" id="document" class="input-field w-100" name="policy_document_location" value="{{ session('step3.policy_document_location', '') }}">
                  </div>
                  <div class="insurance-type pb-3 mb-1">
                     <h6 class="mb-3 fw-bold">What type(s) of home insurance do you have with this company?</h6>
                     <div class="property-add-step-wrapper d-flex flex-column gap-3">
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type1" class="visually-hidden" name="insurance_types[]"  value="{{ session('step3.insurance_types', 'homeowners') }}">
                           <label for="type1" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Homeowners</span>
                           </label>
                        </div>
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type2" class="visually-hidden" name="insurance_types[]" value="{{ session('step3.insurance_types', 'renters') }}">
                           <label for="type2" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Renters</span>
                           </label>
                        </div>
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type3" class="visually-hidden" name="insurance_types[]" value="{{ session('step3.insurance_types', 'liability') }}">
                           <label for="type3" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Liability / Umbrella</span>
                           </label>
                        </div>
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type4" class="visually-hidden" name="insurance_types[]" value="{{ session('step3.insurance_types', 'mortgage') }}">
                           <label for="type4" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Mortgage</span>
                           </label>
                        </div>
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type5" class="visually-hidden" name="insurance_types[]" value="{{ session('step3.insurance_types', 'flood') }}">
                           <label for="type5" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Flood</span>
                           </label>
                        </div>
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type6" class="visually-hidden" name="insurance_types[]" value="{{ session('step3.insurance_types', 'earthquake') }}">
                           <label for="type6" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Earthquake</span>
                           </label>
                        </div>
                        <div class="checkbox-style position-relative">
                           <input type="checkbox" id="type7" class="visually-hidden" name="insurance_types[]" value="{{ session('step3.insurance_types', 'others') }}">
                           <label for="type7" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                              <span class="radio-btn d-flex align-items-center justify-content-center rounded-1"><i class="fa-regular fa-check"></i></span>
                              <span>Others</span>
                           </label>
                        </div>
                     </div>
                  </div>

                  <div class="form-btn-wrapper d-flex align-items-center justify-content-between my-3 py-1">
                     <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="submit" class="form-btn signup-btn theme-btn d-inline-block fw-bold">Continue to Security Information</button>
                        <a href="{{route('step3')}}" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Back to Ownership</a>
                     </div>
                     <a href="{{route('home-property')}}" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Cancel</a>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection