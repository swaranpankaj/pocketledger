<footer class="footer-area">
      <div class="container">
         <div class="footer-copyright d-flex align-items-center justify-content-center gap-3">
            <p class="copyright-text mb-0">© 2024 Pocket Ledger Private Ltd,</p>
            <ul class="copyright-links d-flex align-items-center gap-2">
               <li><a href="#" class="text-decoration-underline">Terms of Use</a></li>
               <li><a href="#" class="text-decoration-underline">Privacy</a></li>
            </ul>
         </div>
      </div>
   </footer>
   <!-- footer area end -->

   <!-- Optional JavaScript; choose one of the two! -->
   <script src="{{ asset('assets/js/jquery-3.7.1.min.js')}}"></script>
   <script src="{{ asset('assets/js/popper.min.js')}}"></script>
   <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
   <script src="{{ asset('assets/js/swiper-bundle.min.js')}}"></script>
   <script src="{{ asset('assets/js/main.js')}}"></script>

   <script>
   document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.submit-question').forEach(button => {
         button.addEventListener('click', function (event) {
            const form = this.closest('.question-form');
            const nextModalId = form.getAttribute('data-next-modal');
            const formData = new FormData(form);
            const errorSpan = form.querySelector('.error-message'); // Ensure the error span is specific to the form
               // Clear any previous error message
               errorSpan.textContent = '';
               errorSpan.classList.remove('alert', 'alert-danger');

               // Check if any answer is selected
            let isAnswerSelected = false;
            form.querySelectorAll('input[name="selected_options[]"]').forEach(input => {
               if (input.checked) {
                  isAnswerSelected = true;
               }
            });
           if(isAnswerSelected){
             // Perform an AJAX request
             fetch("{{ route('submitQuestion') }}", {
               method: "POST",
               headers: {
                  "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
               },
               body: formData
            })
            .then(response => response.text()) // Use text() to inspect non-JSON responses
                     .then(data => {
                        console.log(data); // Log the raw response to see the actual content
                        try {
                           const jsonData = JSON.parse(data); // Parse the data
                           if (jsonData.success) {
                                 $(form.closest('.modal')).modal('hide');
                                 if (nextModalId) {
                                    $('#' + nextModalId).modal('show');
                                 }
                           } else {
                                 alert('Error: ' + (jsonData.message || 'Unable to submit the question.'));
                           }
                        } catch (error) {
                           console.error("Invalid JSON response:", error, data);
                        }
                     })
                     .catch(error => {
                        console.error('Error:', error);
                   });
           }else{
            event.preventDefault(); // This ensures no unintended behavior occurs
                // Show the error message if no option is selected
            errorSpan.textContent = 'Please select an option before submitting.';
            errorSpan.classList.add('alert', 'alert-danger'); // Add the alert and danger classes

              
            }
           
         });
      });
   });
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.submit-nominee').forEach(button => {
         button.addEventListener('click', function (event) {
            const form = this.closest('.nominee-form');
            const nextModalId = form.getAttribute('data-next-modal');
            const formData = new FormData(form);
            const errorSpan = form.querySelector('.error-message-nominee'); // Ensure the error span is specific to the form
               // Clear any previous error message
               errorSpan.textContent = '';
               errorSpan.classList.remove('alert', 'alert-danger');

               // Add status=1 to form data when submitting
            formData.append('status', 1);
            // Check if any of the required fields have values
            const firstName = formData.get('first_name');
            const lastName = formData.get('last_name');
            const emailAddress = formData.get('email_address');
            const phoneNumber = formData.get('phone_number');
            const relationship = formData.get('relationship');
      
            if (firstName || lastName || emailAddress || phoneNumber || relationship) {

               // Perform an AJAX request
               fetch("{{ route('submitNominee') }}", {
               method: "POST",
               headers: {
                  "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
               },
               body: formData
            })
            .then(response => response.text()) // Use text() to inspect non-JSON responses
                     .then(data => {
                        try {
                           const jsonData = JSON.parse(data); // Parse the data
                           if (jsonData.success) {
                                 $(form.closest('.modal')).modal('hide');
                                 if (nextModalId) {
                                    $('#' + nextModalId).modal('show');
                                 }
                           } else {
                                 alert('Error: ' + (jsonData.message || 'Unable to submit the question.'));
                           }
                        } catch (error) {
                           console.error("Invalid JSON response:", error, data);
                        }
                     })
                     .catch(error => {
                        console.error('Error:', error);
                   });
           }else{
            $(form.closest('.modal')).modal('hide');
            if (nextModalId) {
            $('#' + nextModalId).modal('show');
            }
            }
           
         });
      });
   });
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.skip-nominee').forEach(button => {
         button.addEventListener('click', function (event) {
            const form = this.closest('.nominee-form');
            const nextModalId = form.getAttribute('data-next-modal');
            const formData = new FormData(form);
            // Add status=0 to form data when skipping
            formData.append('status', 0);
            // Check if any of the required fields have values
            const firstName = formData.get('first_name');
            const lastName = formData.get('last_name');
            const emailAddress = formData.get('email_address');
            const phoneNumber = formData.get('phone_number');
            const relationship = formData.get('relationship');
            if (firstName || lastName || emailAddress || phoneNumber || relationship) {

            // Perform an AJAX request
            fetch("{{ route('submitNominee') }}", {
            method: "POST",
            headers: {
               "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            },
            body: formData
            })
            .then(response => response.text()) // Use text() to inspect non-JSON responses
                  .then(data => {
                     try {
                        const jsonData = JSON.parse(data); // Parse the data
                        if (jsonData.success) {
                              $(form.closest('.modal')).modal('hide');
                              if (nextModalId) {
                                 $('#' + nextModalId).modal('show');
                              }
                        } else {
                              alert('Error: ' + (jsonData.message || 'Unable to submit the question.'));
                        }
                     } catch (error) {
                        console.error("Invalid JSON response:", error, data);
                     }
                  })
                  .catch(error => {
                     console.error('Error:', error);
               });
            }else{
            $(form.closest('.modal')).modal('hide');
            if (nextModalId) {
            $('#' + nextModalId).modal('show');
            }
            }
           
         });
      });
   });
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.submit-verification').forEach(button => {
         button.addEventListener('click', function (event) {
            const form = this.closest('.verification-form');
            const nextModalId = form.getAttribute('data-next-modal');
            const formData = new FormData(form);
            const errorSpan = form.querySelector('.error-message-verify'); // Ensure the error span is specific to the form
               // Clear any previous error message
               errorSpan.textContent = '';
               errorSpan.classList.remove('alert', 'alert-danger');

            // Check if any of the required fields have values
            const mobileVerification = formData.get('mobile_number_verification');
            if (mobileVerification) {

               // Perform an AJAX request
               fetch("{{ route('submitVerification') }}", {
               method: "POST",
               headers: {
                  "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
               },
               body: formData
            })
            .then(response => response.text()) // Use text() to inspect non-JSON responses
                     .then(data => {
                        console.log(data); // Log the raw response to see the actual content
                        try {
                           const jsonData = JSON.parse(data); // Parse the data
                           if (jsonData.success) {
                                 $(form.closest('.modal')).modal('hide');
                                 if (nextModalId) {
                                    $('#' + nextModalId).modal('show');
                                 }
                           } else {
                                 alert('Error: ' + (jsonData.message || 'Unable to submit the question.'));
                           }
                        } catch (error) {
                           console.error("Invalid JSON response:", error, data);
                        }
                     })
                     .catch(error => {
                        console.error('Error:', error);
                   });
           }else{
            event.preventDefault(); // This ensures no unintended behavior occurs
                // Show the error message if no option is selected
            errorSpan.textContent = 'Please select an option before submitting.';
            errorSpan.classList.add('alert', 'alert-danger'); // Add the alert and danger classes

              
            }
           
         });
      });
   });
</script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.skip-verification').forEach(button => {
         button.addEventListener('click', function (event) {
            const form = this.closest('.verification-form');
            const nextModalId = form.getAttribute('data-next-modal');
             $(form.closest('.modal')).modal('hide');
             if (nextModalId) {
              $('#' + nextModalId).modal('show');
          }
           
         });
      });
   });
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.submit-backup').forEach(button => {
         button.addEventListener('click', function (event) {
            const form = this.closest('.backup-form');
            const formData = new FormData(form);
            // Check if any of the required fields have values
            const backupEmail = formData.get('backup_email');
            if (backupEmail) {

               // Perform an AJAX request
               fetch("{{ route('submitVerification') }}", {
               method: "POST",
               headers: {
                  "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
               },
               body: formData
            })
            .then(response => response.json())
            .then(data => {
               if (data.success) {
                  form.reset();
                  // Hide the current modal
                  $(form.closest('.modal')).modal('hide');
               
               } else {
                  alert('Error: ' + (data.message || 'Unable to submit the question.'));
               }
            })
            .catch(error => {
               console.error('Error:', error);
            });
            }else{
               $(form.closest('.modal')).modal('hide');
            }
            
         });
      });
   });
</script>

<!-- homeproperty functions starts from header_register_callback -->

<script>
   document.addEventListener('DOMContentLoaded', function () {
      console.log('DOM');
      const form = document.querySelector('.property-add-step-box');
      const continueButton = form.querySelector('.signup-btn');
      console.log(form);
      continueButton.addEventListener('click', function (event) {
         event.preventDefault(); // Prevent the default form submission

         // Get the selected radio button
         const selectedOption = form.querySelector('input[name="property-add-step"]:checked');
         if (selectedOption) {
            const selectedValue = selectedOption.value;
            // Redirect based on the selected radio button
            console.log("Selected ID:", selectedValue);

            // Define a mapping of selected values to URLs
            const urlMapping = {
                "1": "{{ route('step2') }}",  // Example: Asset ID 1 goes to step2
                "2": "/other-real-estate-page-url",
                "3": "/vehicles-page-url",
                "4": "/safe-deposit-boxes-page-url",
                "5": "/home-safes-page-url",
                "6": "/important-possessions-page-url"
            };
            // Get the URL for the selected option
            const targetUrl = urlMapping[selectedValue] || "{{ route('home-property') }}"; // Default to step2 if no match

            // Redirect with selected_id as a query parameter
            window.location.href = targetUrl + "?selected_id=" + encodeURIComponent(selectedValue);
         } else {
            alert('Please select an option before continuing.');
         }
      });
   });
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('country').addEventListener('change', function () {
        var countryId = this.value;
        var stateDropdown = document.getElementById('state');

        // Clear previous options
        stateDropdown.innerHTML = '<option value="">Select an option</option>';

        if (countryId) {
            fetch('/get-states/' + countryId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(state => {
                        var option = document.createElement('option');
                        option.value = state.id;
                        option.textContent = state.name;
                        stateDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching states:', error));
        }
    });
});
</script>

<script>
    function updateLabel() {
        // Get the selected option
        var select = document.getElementById("select-document");
        var selectedOption = select.options[select.selectedIndex];
        
         // Get the document name from data attribute
         var documentName = selectedOption.getAttribute("data-name");
         if(documentName){
         // Update the label text
         document.getElementById("document-label").innerText = documentName + " Number";
         document.getElementById("location-document-label").innerText ="Location of the item - Your "+ documentName;
        }else{
         document.getElementById("document-label").innerText = "Document Number";
         document.getElementById("location-document-label").innerText ="Location of the item - Your Document";
        }
        
    }
</script>




