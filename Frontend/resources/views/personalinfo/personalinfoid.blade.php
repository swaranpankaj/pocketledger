@extends('layouts.app')

@section('content')

  <!-- dashboard area start -->
  <section class="myprofile-area dashboard-area">
         <div class="container">
            <div class="myprofile-wrapper dashboard-area-wrapper mx-auto">
               <div class="myprofile-title dasboard-title">
                  <h4 class="fw-bold">Add Personal Information & IDs</h4>
                  <p class="mb-3 pb-1">In this section, you can upload all necessary identification documents as proof.</p>
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
               <form id="profile-form" enctype="multipart/form-data" Method="POST" class="profile-form signup-form p-3" action="{{route('submitPersonalInfoID')}}">
               @csrf
                  <div class="form-input">
                     <label for="select-document" class="d-inline-block fw-bold mb-1" required="">Type of document</label>
                     <select type="text" id="select-document" class="input-field w-100" onchange="updateLabel()" name="document_type">
                        <option value="">Select an option</option>
                     @foreach($documents as $document) 
                        <option value="{{$document->id}}" data-name="{{$document->name}}">{{$document->name}}</option>
                        @endforeach
                     </select>
                     <p class="mb-0 mt-1">Why do we ask for this information?</p>
                  </div>
                  <div class="form-input-wrapper d-flex flex-column flex-sm-row">
                     <div class="form-input w-100">
                        <label id="document-label" for="license-num" class="d-inline-block fw-bold mb-1">Document Number</label>
                        <input type="text" id="license-num" class="input-field w-100" name="document_number">
                     </div>
                     <div class="form-input w-100">
                        <label for="expire-date" class="d-inline-block fw-bold mb-1">Expire Date</label>
                        <input type="date" id="expire-date" class="input-field w-100" name="expire_date">
                     </div>
                  </div>
                  <div class="form-input w-100">
                     <label id="location-document-label" for="location" class="d-inline-block fw-bold mb-1">Location of the item - Your Document</label>
                     <input type="text" id="location" class="input-field w-100" name="location_of_item">
                  </div>
                  <div class="form-input w-100">
                     <label for="additional-note" class="d-inline-block fw-bold mb-1">Additional Note</label>
                     <textarea id="additional-note" class="input-field w-100" name="additional_notes"></textarea>
                  </div>
                  <div class="form-input file-upload w-100 text-center p-3">
                     <label for="upload" class="upload-btn d-inline-flex gap-2 fw-bold"><i class="fa-regular fa-arrow-up-from-bracket"></i> Upload Image</label>
                     <input type="file" id="upload" class="visually-hidden" name="image">
                     <p class="mb-0 fs-6">Upload your diving license scan copy</p>
                  </div>
                  <div class="form-btn-wrapper d-flex align-items-center pt-3 mt-1">
                     <button type="submit" class="form-btn signup-btn theme-btn d-inline-block fw-bold">Add Your Personal Information & ID’s</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- dashboard area end -->
@endsection