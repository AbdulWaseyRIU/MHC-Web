<script>
function validateName() {
    var nameInput = document.getElementById('name');
    var nameError = document.getElementById('nameError');

    // Remove leading and trailing spaces
    var trimmedName = nameInput.value.trim();

    // Check if the name contains only letters and spaces
    if (/^[a-zA-Z\s]+$/.test(trimmedName) && trimmedName.length >= 3) {
        nameError.textContent = '';
        return true;
    } else {
        nameError.textContent = 'Name should be more than 3 alphabets and contain only letters and spaces';
        return false;
    }
}
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

      function validateConfirmPassword() {
    var confirmPasswordInput = document.getElementById('password-confirm');
    var confirmPasswordError = document.getElementById('confirmPasswordError');
    var passwordInput = document.getElementById('password');

    if (confirmPasswordInput.value !== passwordInput.value) {
        confirmPasswordError.textContent = 'Passwords do not match';
        return false; // Return false to indicate validation failure
    } else {
        confirmPasswordError.textContent = '';
        return true; // Return true to indicate validation success
    }
}
      function validateForm() {
    // Call all validation functions and submit the form only if all are true
    var isNameValid = validateName();
    var isEmailValid = validateEmail();
    var isPasswordValid = validatePassword();
    var isConfirmPasswordValid = validateConfirmPassword();

    if (isNameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid) {
        // Form is valid, submit the form
        alert
        document.getElementById('registerform').submit();
    }
}
      // Add keyup event listeners for validation
      document.getElementById('name').addEventListener('keyup', validateName);
      document.getElementById('email').addEventListener('keyup', validateEmail);
      document.getElementById('password').addEventListener('keyup', validatePassword);
      document.getElementById('password-confirm').addEventListener('keyup', validateConfirmPassword);

      document.getElementById('registerform').addEventListener('submit', function (event) {

          event.preventDefault(); // Prevent default form submission behavior
          validateForm(); // Call the validateForm function instead
      });
  </script>
