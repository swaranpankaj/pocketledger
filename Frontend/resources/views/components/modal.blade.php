

   @if (isset($pageStep1))
   <div class="mymodal step-modal onboard-step-one modal fade" id="onboardStep1Modal" tabindex="-1" aria-labelledby="onboardStep1ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border-0">
            <div class="modal-body">
               <img src="{{$pageStep1->image}}" alt="check-circle" class="modal-title-icon">
               <h2 class="modal-title fw-bold mt-4 pt-2 mb-2 pb-1">{{$pageStep1->title}}</h2>
               <p class="modal-desc">{{$pageStep1->description}}</p>
               <button type="button" class="modal-btn theme-btn big" data-bs-toggle="modal" data-bs-target="#onboardStep2Modal">{{ ucfirst($pageStep1->button) }}</button>
            </div>
         </div>
      </div>
   </div>
   @endif
   <!-- onboard step one end -->

   <!-- onboard step two -->
   @if (isset($questions) && $questions->isNotEmpty())
   @foreach ($questions as $index => $question)
   <div class="mymodal step-modal onboard-step-two modal fade" id="onboardStep{{$index+2}}Modal" tabindex="-1" aria-labelledby="onboardStep{{$index+2}}ModalLabel" aria-hidden="true">
  
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border-0">
            <div class="modal-body">
            <form method="POST" class="question-form" data-next-modal="{{ $index < count($questions) - 1 ? 'onboardStep' . ($index + 3) . 'Modal' : 'page1Modal' }}">
            @csrf
                  <input type="hidden" name="question_id" value="{{ $question->id }}">
                     <img src="{{$question->image}}" alt="finger-print" class="modal-title-icon">
                     <h2 class="modal-title fw-bold mt-3 mb-2 pb-1">{{ $question->question }}</h2>
                     <p class="modal-desc">{{ $question->description }}</p>
                     <div class="digital-work-wrapper">
                     <div class="error-message mb-4"></div>
                        <h6 class="fw-bold">{{ $question->title }}</h6>
                        <div class="digital-work-list d-flex flex-column">
                           @foreach ($question->options as $option)
                           <div class="digital-work checkbox-style position-relative">
                              <input type="{{$question->input_type}}" name="selected_options[]" id="{{$question->input_type == 'checkbox' ? 'checkbox_' . $option->id : 'radio' . $option->id}}" class="visually-hidden"  value="{{$option->id}}">
                              <label for="{{$question->input_type == 'checkbox' ? 'checkbox_' . $option->id : 'radio' . $option->id}}" class="d-flex align-items-center user-select-none">
                                 <span class="radio-btn d-flex align-items-center justify-content-center rounded-{{$question->input_type == 'checkbox'?'1':'circle'}}"><i class="fa-regular fa-check"></i></span>
                                 <span>{{$option->options}}</span>
                              </label>
                           </div>
                           @endforeach
                        </div>
                     </div>
                  <button type="button" class="modal-btn theme-btn big submit-question" id="submit-question">{{ ucfirst($question->button) }}</button>
               </form>
            </div>
           
         </div>
      </div>
      <!-- #page1Modal -->
   </div>
   @endforeach  
   @endif
   <!-- onboard step two end -->


   <!-- onboard step nine -->
   @if (isset($pageAllData) && $pageAllData->isNotEmpty())
   @foreach ($pageAllData as $index => $page)
   <div class="mymodal step-modal onboard-step-nine modal fade" id="page{{$index+1}}Modal" tabindex="-1" aria-labelledby="page{{$index+1}}ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border-0">
            <div class="modal-body">
               <img src="{{$page->image}}" alt="badge" class="modal-title-icon">
               <h2 class="modal-title fw-bold mt-3 mb-2 pb-1">{{$page->title}}</h2>
               <p class="modal-desc">{{$page->description}}</p>
               @if($index == 0)
               <form action="POST" class="nominee-form" data-next-modal="page{{$index+2}}Modal">
               @csrf
               <div class="error-message-nominee mb-4"></div>
                  <div class="form-input-wrapper d-flex flex-column flex-sm-row">
                     <div class="form-input w-100">
                        <label for="f-name" class="d-inline-block fw-bold mb-1">First Name <span>(Optional)</span></label>
                        <input type="text" id="f-name" class="input-field w-100" name="first_name">
                     </div>
                     <div class="form-input w-100">
                        <label for="l-name" class="d-inline-block fw-bold mb-1">Last Name <span>(Optional)</span></label>
                        <input type="text" id="l-name" class="input-field w-100" name="last_name">
                     </div>
                  </div>
                  <div class="form-input-wrapper d-flex flex-column flex-sm-row">
                     <div class="form-input w-100">
                        <label for="email" class="d-inline-block fw-bold mb-1">Email Address <span>(Optional)</span></label>
                        <input type="email" id="email" class="input-field w-100" name="email_address">
                     </div>
                     <div class="form-input w-100">
                        <label for="phone" class="d-inline-block fw-bold mb-1">Phone Number <span>(Optional)</span></label>
                        <input type="tel" id="phone" class="input-field w-100" name="phone_number">
                     </div>
                  </div>
                  <div class="form-input">
                     <label for="select-relationship" class="d-inline-block fw-bold mb-1">Your Relationship with this person <span>(Optional)</span></label>
                     <select id="select-relationship" class="input-field w-100" name="relationship">
                        <option value="">Select any option</option>
                        <option value="1">Wife</option>
                        <option value="2">Children</option>
                        <option value="3">Legal Partner</option>
                     </select>
                     <p class="mb-0 mt-1">Why do we ask for this information?</p>
                  </div>

                  <div class="form-btn-wrapper d-flex align-items-center justify-content-between">
                     <button type="button" class="form-btn signup-btn theme-btn big d-inline-block fw-bold submit-nominee" >{{ ucfirst($page->button) }}</button>
                     <button type="button" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold skip-nominee">{{ ucfirst($page->button1) }}</button>
                  </div>
               </form>
               @elseif($index == 1)
               <ul>
                  <li class="modal-desc mb-0">All information in your Pocket Ledger is encrypted using the most modern standards</li>
                  <li class="modal-desc mb-0">Your personal information belongs to you alone -- only people you choose to share your information with can decrypt your data</li>
                  <li class="modal-desc mb-0">We are governed and audited under the same security and privacy frameworks -- HIPAA and SOC2 -- used by major financial institutions and healthcare providers</li>
               </ul>
               <div class="form-btn-wrapper d-flex align-items-center gap-2 py-3 my-1">
                  <button type="button" class="modal-btn theme-btn big" data-bs-toggle="modal" data-bs-target="#page{{$index+2}}Modal">{{ ucfirst($page->button) }}</button>
                  <button type="reset" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold">{{ ucfirst($page->button1) }}</button>
               </div>
               @elseif($index == 2)
               <form action="POST" class="verification-form" data-next-modal="page{{$index+2}}Modal">
               @csrf
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="error-message-verify mb-4"></div>
               <div class="form-input w-100">
                  <label for="mobile-num" class="d-inline-block fw-bold mb-1">Enter your Mobile Number</label>
                  <input type="tel" id="mobile-num" class="input-field w-100" name="mobile_number_verification">
               </div>
               <div class="form-btn-wrapper d-flex align-items-center gap-2 py-3 my-1">
                  <button type="button" class="modal-btn theme-btn big submit-verification">{{ ucfirst($page->button) }}</button>
                  <button type="button" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold skip-verification">{{ ucfirst($page->button1) }}</button>
               </div>
               </form>
               @elseif($index == 3)
               <div class="form-input w-100">
                  <label for="verification-code" class="d-inline-block fw-bold mb-1">Verification Code</label>
                  <input type="tel" id="verification-code" class="input-field w-100">
               </div>
               <div class="form-btn-wrapper d-flex align-items-center gap-2 py-4 my-1">
                  <button type="button" class="modal-btn theme-btn big" data-bs-toggle="modal" data-bs-target="#backupEmail">{{ ucfirst($page->button) }}</button>
                  <button type="button" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold skip-code" data-bs-dismiss="modal">{{ ucfirst($page->button1) }}</button>
               </div>
               <a href="#" class="resend-btn text-decoration-underline d-inline-block">Resend the code again</a>
               @endif
            </div>
         </div>
      </div>
   </div>
   @endforeach  
   @endif
   <!-- onboard step nine end -->

   <!--backup email modal -->
   <div class="mymodal backup-email step-modal modal fade" id="backupEmail" tabindex="-1" aria-labelledby="backupEmailLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content border-0">
         <form action="POST" class="backup-form">
         @csrf
            <div class="modal-body">
               <img src="assets/img/icon/envelope.svg" alt="envelope" class="modal-title-icon">
               <h2 class="modal-title fw-bold mt-3 mb-2 pb-1">Backup Email</h2>
               <p class="modal-desc">Please add a secondary email for your account for security backup.</p>
               <div class="form-input w-100">
                  <label for="email" class="d-inline-block fw-bold mb-1">Email Address</label>
                  <input type="email" id="email" class="input-field w-100" name="backup_email">
               </div>
               <div class="form-btn-wrapper d-flex align-items-center gap-2 pt-2">
                  <button type="button" class="modal-btn theme-btn big submit-backup">Done</button>
                  <button type="reset" class="form-btn cancel-btn theme-btn big d-inline-block fw-bold" data-bs-dismiss="modal">Cancel</button>
               </div>
            </div>
         </form>
         </div>
      </div>
   </div>
   <!--backup email modal end -->


   <!-- onboard step modal end -->