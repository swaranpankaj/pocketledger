@extends('layouts.app')

@section('content')

   <!-- dashboard area start -->
   <section class="dashboard-area">
         <div class="container">
            <div class="dashboard-area-wrapper mx-auto">
            <div class="success-msg-box d-flex justify-content-between align-items-start gap-1">
                  <div class="pt-3 mt-1">
                     <h5 class="success-msg-title d-flex fw-bold mb-4 pb-1"><i class="fa-solid fa-check-circle"></i> Your driver's license has been added successfully. If you have more legal IDs to add, please click "Add" to include another document type.</h5>
                     <div class="text-center">
                        <a href="{{route('personalInformation')}}" class="theme-btn d-inline-block">Add Additional Personal Information & ID</a>
                     </div>
                  </div>
                  <button type="button" title="Close" class="close-icon bg-transparent border-0"><i class="fa-regular fa-xmark"></i></button>
               </div>
               <div class="dasboard-title mb-3 pb-1">
                  <h4 class="fw-bold mb-4">Personal Information and IDs</h4>
                  <p class="mb-3 pb-1">In this section, you can upload all necessary identification documents as proof.</p>
                  <a href="{{route('personalInformation')}}" class="theme-btn d-inline-block">Add Additional Personal Information & ID</a>
               </div>
               <div class="personal-info-container">
                  <p class="personal-info-container-title d-flex align-items-center"><img src="assets/img/icon/lock.svg" alt="lock"> All your data is secured with AES 256 encryption. We do not share your information with any third parties for marketing or any other purposes.</p>
                  <div class="personal-info-wrapper">
                     <div class="row">
                     @foreach($getPersonalInformation as $info) 
                        <div class="col-md-6">
                           <div class="personal-info-blk h-100">
                              <div class="info-blk-top d-flex align-items-center justify-content-between mb-4">
                                 <span class="d-inline-block">{{$info->document->name}}</span>
                                 <button type="button" class="d-flex align-items-center justify-content-center border-0 bg-transparent"><img src="assets/img/icon/pencil.svg" alt="pencil"></button>
                              </div>
                              <div class="info-blk-title">
                                 <h5 class="fw-bold">{{$info->user->first_name}} {{$info->user->last_name}}</h5>
                                 <p class="d-flex align-items-center gap-1 mb-0"><img src="assets/img/icon/user-icon.svg" alt="user icon"><span>{{$info->document_number}}</span></p>
                              </div>
                              <div class="single-info">
                                 <h6 class="fw-bold">Location of Item</h6>
                                 <p class="mb-0">{{$info->location_of_item}}</p>
                              </div>
                              <div class="single-info">
                                 <h6 class="fw-bold">Valid Duration</h6>
                                 <p class="mb-0">{{$info->expire_date}}</p>
                              </div>
                           </div>
                        </div>
                     @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection