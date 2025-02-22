@extends('layouts.app')

@section('content')
   <!-- dashboard area start -->
   <section class="dashboard-area">
         <div class="container">
            <div class="dashboard-area-wrapper mx-auto">
               <div class="dasboard-title">
                  <img src="assets/img/icon/sun-icon.svg" alt="sun icon">
                  <h4 class="fw-bold my-3 pt-1">Welcome {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h>
               </div>
               <div class="dashboard-info-blk checklist">
                  <h4 class="mb-4 fw-normal">Checklist: Documents To Organize And Share</h4>
                  <h5 class="mb-4 fw-normal">Here are some of the essential documents, accounts, and types of information to organize and put in your Pocket Ledger.</h5>
                  <a href="#" class="readmore-btn fs-5 text-decoration-underline">Read more</a>
               </div>
               <div class="dashboard-info-blk account-setup">
                  <h4 class="fw-bold mb-4">Account setup</h4>
                  <ul class="account-setup-steps d-flex flex-column">
                     <li><a href="#" class="single-step done-step d-flex align-items-center gap-3 gap-md-4 fs-5"><i class="fa-solid fa-circle-check"></i> <span>Create your account</span></a></li>
                     <li><a href="#" class="single-step d-flex align-items-center gap-3 gap-md-4 fs-5"><i class="fa-solid fa-circle-check"></i> <span class="text-decoration-underline">Share your plan with someone you trust</span></a></li>
                     <li><a href="#" class="single-step d-flex align-items-center gap-3 gap-md-4 fs-5"><i class="fa-solid fa-circle-check"></i> <span class="text-decoration-underline">Secure your account with two-step verification</span></a></li>
                     <li><a href="#" class="single-step d-flex align-items-center gap-3 gap-md-4 fs-5"><i class="fa-solid fa-circle-check"></i> <span class="text-decoration-underline">Add a backup email so you don't get locked out</span></a></li>
                  </ul>
               </div>
               <div class="manage-pocket">
                  <p class="fs-4 mb-3 pb-1">Manage your Pocket Ledger :</p>
                  <ul class="d-flex flex-column gap-3">
                     <li><a href="#" class="d-flex align-items-center justify-content-between gap-4 p-3 p-md-4 fw-bold fs-5"><span>Personal Info and IDs</span> <i class="fa-regular fa-arrow-right"></i></a></li>
                     <li><a href="#" class="d-flex align-items-center justify-content-between gap-4 p-3 p-md-4 fw-bold fs-5"><span>Home and Property</span> <i class="fa-regular fa-arrow-right"></i></a></li>
                     <li><a href="#" class="d-flex align-items-center justify-content-between gap-4 p-3 p-md-4 fw-bold fs-5"><span>Financials</span> <i class="fa-regular fa-arrow-right"></i></a></li>
                  </ul>
               </div>
               <!-- Button trigger modal -->
               <button type="button" class="theme-btn mt-4" data-bs-toggle="modal" data-bs-target="#onboardStep1Modal">Onboard Step Modal</button>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
      @endsection

      @include('components.modal', ['questions' => $questions,'pageStep1'=>$pageStep1,'pageAllData'=>$pageAllData])