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
                     <span class="rounded-circle d-flex align-items-center justify-content-center text-white border-0"><img src="assets/img/icon/check-circle-running.svg" alt="check-circle"></span>
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

               <form id="property-form" enctype="multipart/form-data" Method="POST" class="property-add-step-box-3 p-3" action="{{route('addStep3')}}">
               @csrf
                  <div class="form-input w-100">
                     <label for="own" class="d-inline-block fw-bold mb-1">Do you own or rent?</label>
                     <select id="own" class="input-field w-100" name="own_or_rent" value="{{ session('step2.own_or_rent', '') }}">
                     @foreach($ownerships as $ownership)   
                     <option value="{{$ownership->id}}">{{$ownership->name}}</option>
                     @endforeach
                     </select>
                  </div>
                  <div class="form-input w-100">
                     <label for="deed" class="d-inline-block fw-bold mb-1">Where do you keep the original deed?</label>
                     <input type="text" id="deed" class="input-field w-100" name="deed_storage_location" value="{{ session('step2.deed_storage_location', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="ownership" class="d-inline-block fw-bold mb-1">What's the ownership structure?</label>
                     <input type="text" id="ownership" class="input-field w-100" name="ownership_structure" value="{{ session('step2.ownership_structure', '') }}">
                  </div>
                  <div class="form-input w-100">
                     <label for="additional-note" class="d-inline-block fw-bold mb-1">Additional Notes</label>
                     <input type="text" id="additional-note" class="input-field w-100" name="additional_notes" value="{{ session('step2.additional_notes', '') }}">
                  </div>
                  <div class="form-input file-upload w-100 text-center p-3">
                     <label for="upload" class="upload-btn d-inline-flex gap-2 fw-bold"><i class="fa-regular fa-arrow-up-from-bracket"></i> Upload Image</label>
                     <input type="file" id="upload" class="visually-hidden" name="document_image" value="{{ session('step2.document_image', '') }}">
                     <p class="mb-0 fs-6">Upload your scan copy of property document</p>
                  </div>
                  <div class="form-btn-wrapper d-flex align-items-center justify-content-between my-3 py-1">
                     <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="submit" class="form-btn signup-btn theme-btn d-inline-block fw-bold">Continue to Insurance</button>
                        <a href="{{route('step2')}}" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Back to Basic Information</a>
                     </div>
                     <a href="{{route('home-property')}}" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Cancel</a>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection