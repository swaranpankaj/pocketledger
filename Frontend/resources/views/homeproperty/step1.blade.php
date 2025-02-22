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
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif

               <form action="#" class="property-add-step-box p-3">
                  <h6 class="fw-bold mb-3">Select the type of assets</h6>
                  <div class="property-add-step-wrapper d-flex flex-column gap-3 mb-3 pb-1">
                  @foreach($assets as $asset)
                     <div class="checkbox-style position-relative">
                        <input type="radio" name="property-add-step" id="step{{$asset->id}}" class="visually-hidden" value="{{$asset->id}}">
                        <label for="step{{$asset->id}}" class="d-flex align-items-center user-select-none p-0 border-0 bg-transparent">
                           <span class="radio-btn d-flex align-items-center justify-content-center rounded-circle"><i class="fa-regular fa-check"></i></span>
                           <span>{{ $asset->name }}</span>
                        </label>
                     </div>
                     @endforeach
                  </div>
                  <div class="form-btn-wrapper d-flex align-items-center justify-content-between my-3 py-1">
                     <a href="#" class="form-btn signup-btn theme-btn d-inline-block fw-bold">Continue</a>
                     <a href="#" class="form-btn cancel-btn theme-btn d-inline-block fw-bold">Cancel</a>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection