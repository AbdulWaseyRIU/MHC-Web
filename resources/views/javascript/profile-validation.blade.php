
<script>
    function validateProfileForm() {
      var isNameValid = validateName('displayName', 'displayNameError');
      var isEmailValid = validateEmail('email', 'emailError');

      if (isNameValid && isEmailValid) {
        document.getElementById('profileForm').submit();
      }
    }

    function validatePasswordForm() {
      var isCurrentPasswordValid = validatePassword('currentPassword', 'currentPasswordError');
      var isNewPasswordValid = validatePassword('newPassword', 'newPasswordError');
      var isConfirmPasswordValid = validateConfirmPassword('newPassword', 'confirmPassword', 'confirmPasswordError');

      if (isCurrentPasswordValid && isNewPasswordValid && isConfirmPasswordValid) {
        document.getElementById('profileForm').submit();
      }
    }

    function validateName(nameInputId, errorId) {
      var nameInput = document.getElementById(nameInputId);
      var errorElement = document.getElementById(errorId);
      var trimmedName = nameInput.value.trim();

      if (/^[a-zA-Z\s]+$/.test(trimmedName) && trimmedName.length >= 3) {
        errorElement.textContent = '';
        return true;
      } else {
        errorElement.textContent = 'Name should be more than 3 alphabets and contain only letters and spaces';
        return false;
      }
    }

    function validateEmail(emailInputId, errorId) {
      var emailInput = document.getElementById(emailInputId);
      var errorElement = document.getElementById(errorId);
      var emailRegex = /^[^\s@.][^\s@]*@[^\s@]+\.[^\s@]+$/;

      if (emailRegex.test(emailInput.value)) {
        errorElement.textContent = '';
        return true;
      } else {
        errorElement.textContent = 'Enter a valid email address';
        return false;
      }
    }

    function validatePassword(passwordInputId, errorId) {
      var passwordInput = document.getElementById(passwordInputId);
      var errorElement = document.getElementById(errorId);

      if (passwordInput.value.length >= 8) {
        errorElement.textContent = '';
        return true;
      } else {
        errorElement.textContent = 'Password must be at least 8 characters';
        return false;
      }
    }

    function validateConfirmPassword(passwordInputId, confirmPasswordInputId, errorId) {
      var passwordInput = document.getElementById(passwordInputId);
      var confirmPasswordInput = document.getElementById(confirmPasswordInputId);
      var errorElement = document.getElementById(errorId);

      if (confirmPasswordInput.value === passwordInput.value) {
        errorElement.textContent = '';
        return true;
      } else {
        errorElement.textContent = 'Passwords do not match';
        return false;
      }
    }
  </script>
