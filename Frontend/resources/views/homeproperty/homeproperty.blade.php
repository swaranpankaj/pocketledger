@extends('layouts.app')

@section('content')

<!-- dashboard area start -->
<section class="dashboard-area">
         <div class="container">
            <div class="dashboard-area-wrapper mx-auto">
               <div class="myprofile-title dasboard-title">
                  <h4 class="fw-bold mb-4">Personal Information and IDs</h4>
                  <p class="mb-0">Please add your personal identification documents, such as your driver's license, password, Aadhar Card, and state identification.</p>
               </div>
               <div class="property-wrapper">
                  <div class="property-image text-center mx-auto">
                     <img src="assets/img/enters_password_laptop_lock_key.png" alt="Image" class="w-100">
                  </div>
                  <div class="text-center mt-3">
                     <a href="{{route('home-property-2')}}" class="theme-btn d-inline-block">Add Personal Information and IDs</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection