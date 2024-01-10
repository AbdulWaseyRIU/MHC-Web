<script>
    function validateEmail() {
     var emailInput = document.getElementById('email');
     var emailError = document.getElementById('emailError');
     // Updated regex to ensure the email does not start with a dot
     var emailRegex = /^[^\s@.][^\s@]*@[^\s@]+\.[^\s@]+$/;

     if (!emailRegex.test(emailInput.value)) {
         emailError.textContent = 'Enter a valid email address';
         return false; // Return false to indicate validation failure
     } else {
         emailError.textContent = '';
         return true; // Return true to indicate validation success
     }
 }

     function validatePassword() {
         var passwordInput = document.getElementById('password');
         var passwordError = document.getElementById('passwordError');

         if (passwordInput.value.length < 8) {
             passwordError.textContent = 'Password must be at least 8 characters';
             return false; // Return false to indicate validation failure
         } else {
             passwordError.textContent = '';
             return true; // Return true to indicate validation success
         }
     }

     function validateForm() {
         // Call both validation functions and submit the form only if both are true
         var isEmailValid = validateEmail();
         var isPasswordValid = validatePassword();

         if (isEmailValid && isPasswordValid) {
             // Form is valid, submit the form
             document.getElementById('loginForm').submit();
         }
     }

     // Add keyup event listeners to trigger validation on keypress
     document.getElementById('email').addEventListener('keyup', validateEmail);
     document.getElementById('password').addEventListener('keyup', validatePassword);

     // Handle form submission using the validateForm function
     document.getElementById('loginForm').addEventListener('submit', function (event) {
         event.preventDefault(); // Prevent default form submission behavior
         validateForm(); // Call the validateForm function instead
     });
         </script>
