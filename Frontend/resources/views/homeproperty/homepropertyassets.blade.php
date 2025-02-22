@extends('layouts.app')

@section('content')

 <!-- dashboard area start -->
 <section class="dashboard-area">
         <div class="container">
            <div class="dashboard-area-wrapper mx-auto">
               <div class="myprofile-title dasboard-title">
                  <h4 class="fw-bold mb-4">Property & Assets</h4>
                  <p class="mb-0">In this section, please list all your properties and assets. This will make it easier for your family and loved ones to keep track of everything.</p>
               </div>
               <div class="property-wrapper">
                  <div class="property-image text-center mx-auto">
                     <img src="assets/img/property-img.png" alt="Image">
                  </div>
                  <div class="text-center mt-3">
                     <a href="{{route('step1')}}" class="theme-btn d-inline-block">Add Property and assets</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection