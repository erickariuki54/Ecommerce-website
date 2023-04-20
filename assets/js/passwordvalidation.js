$(document).ready(function() {
  // Get the password and confirm password input fields
  var passwordInput = $('#password');
  var confirmPasswordInput = $('#password-confirm');
  var signupbtn = $('#signup');

  // Disable signup button by default
  signupbtn.prop('disabled', true);

  // Check password and confirm password on input
  confirmPasswordInput.on('input', validatePassword);
  passwordInput.on('input', validatePassword);

  function validatePassword() {
    // Get the password and confirm password input values
    var password = passwordInput.val();
    var confirmPassword = confirmPasswordInput.val();

    // Check if the passwords match
    if (password !== confirmPassword) {
      $('#password-help').text('Passwords do not match');
      $('#password-help').css('color', 'red');
      signupbtn.prop('disabled', true);
    } else {
      $('#password-help').empty();

      // Check if the password meets the minimum requirements
      if (password.length < 8) {
        $('#password-help').text('Password must be at least 8 characters long');
        $('#password-help').css('color', 'red');
        signupbtn.prop('disabled', true);
      } else if (!/[A-Z]/.test(password)) {
        $('#password-help').text('Password must contain at least one uppercase letter');
        $('#password-help').css('color', 'red');
        signupbtn.prop('disabled', true);
      } else if (!/\d/.test(password)) {
        $('#password-help').text('Password must contain at least one number');
        $('#password-help').css('color', 'red');
        signupbtn.prop('disabled', true);
      } else {
        signupbtn.prop('disabled', false);
        $('#password-help').text('password meets requirements ✓');
        $('#password-help').css('color', 'green');
      }
    }
  }
});
