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
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0"><img src="assets/img/icon/check-circle-running.svg" alt="check circle" class="w-100 h-100"></span>
                     <h6 class="fw-bold mb-0">Basic Info</h6>
                  </div>
                  <span class="step-divider w-100 d-block mt-3"></span>
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white"></span>
                     <h6 class="fw-bold mb-0">Ownership</h6>
                  </div>
                  <span class="step-divider w-100 d-block mt-3"></span>
                  <div class="single-step flex-shrink-0 text-center">
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white"></span>
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

               <form method="POST"  class="property-add-step-box-2 p-3" action="{{route('addStep2')}}">
               @csrf
                  <div class="form-input w-100">
                     <label for="type-of-assets" class="d-inline-block fw-bold mb-1">Type of assets</label>
                     <input type="hidden" id="type-of-assets" class="input-field w-100" name="type_of_assets" 
       value="{{ isset($selectedId) ? $selectedId : '' }}">
            <select id="type-of-assets" class="input-field w-100" name="type_of_assets" value="{{ session('step1.type_of_assets', isset($selected_id) && $selected_id) }}"  disabled>
                        @foreach($assets as $asset)
                        <option value="{{ $asset->id }}" {{ isset($selected_id) && $selected_id == $asset->id ? 'selected' : '' }}>{{ $asset->name }}</option>
                        @endforeach
                     
                     </select>
                  </div>
                  <div class="form-input w-100">
                     <label for="property" class="d-inline-block fw-bold mb-1">Label Your Property</label>
                     <input type="text" id="property" class="input-field w-100" name="label_your_property" value="{{ session('step1.label_your_property', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="address-1" class="d-inline-block fw-bold mb-1">Address -1</label>
                     <input type="text" id="address-1" class="input-field w-100" name="address_1" value="{{ session('step1.address_1', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="address-2" class="d-inline-block fw-bold mb-1">Address -2</label>
                     <input type="text" id="address-2" class="input-field w-100" name="address_2" value="{{ session('step1.address_2', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="country" class="d-inline-block fw-bold mb-1">Country</label>
                     <select id="country" class="input-field w-100" name="country" value="{{ session('step1.country', '') }}">
                     <option value="">Select an option</option>
                     @foreach($countries as $country)  
                     <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                     </select>
                  </div>
                  <div class="form-input w-100">
                     <label for="state" class="d-inline-block fw-bold mb-1">State</label>
                     <select id="state" class="input-field w-100" name="state" value="{{ session('step1.state', '') }}">
                        <option value="">Select an option</option>
                     </select>
                  </div>
                  <div class="form-input w-100">
                     <label for="zip-code" class="d-inline-block fw-bold mb-1">Zip Code / Postal Code</label>
                     <input type="text" id="zip-code" class="input-field w-100" name="zip_code" value="{{ session('step1.zip_code', '') }}">
                  </div>
                  <div class="form-btn-wrapper d-flex align-items-center justify-content-between my-3 py-1">
                     <button type="submit" class="form-btn signup-btn theme-btn d-inline-block fw-bold">Continue to Ownership</button>
                     <a href="#" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Cancel</a>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection