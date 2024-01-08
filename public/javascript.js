


function generatePDF() {
    var element = document.getElementById('pdf-content');
    html2pdf(element);
}
function validateEmail() {
    var emailInput = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Enter a valid email address';
    } else {
        emailError.textContent = '';
    }
}




// Add keyup event listeners for validation

document.getElementById('email').addEventListener('keyup', validateEmail);
function validateEmail() {
    var emailInput = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Enter a valid email address';
    } else {
        emailError.textContent = '';
    }
}

function validatePassword() {
    var passwordInput = document.getElementById('password');
    var passwordError = document.getElementById('passwordError');

    if (passwordInput.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters';
    } else {
        passwordError.textContent = '';
    }
}

// Add keyup event listeners to trigger validation on keypress
document.getElementById('email').addEventListener('keyup', validateEmail);
document.getElementById('password').addEventListener('keyup', validatePassword);
