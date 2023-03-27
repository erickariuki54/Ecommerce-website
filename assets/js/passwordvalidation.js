$(document).ready(function() {
  $('#password-confirm').on('input', function() {
    // Get the password and confirm password input values
    var password = $('#password').val();
    var confirmPassword = $('#password-confirm').val();
    var signupbtn = $('#signup');
    // Check if the passwords match
    if (password != confirmPassword) {
      $('#password-help').text('Passwords do not match');
      $('#password-help').css('color', 'red');
    } else {
      $('#password-help').empty();
    }
    // Check if the password meets the minimum requirements
    if (password.length < 4) {
      $('#password-help').text('Password must be at least 4 characters long');
      $('#password-help').css('color', 'red');
      signupbtn.prop("disabled", true);
      
    }else{
      signupbtn.prop("disabled", false);
      
    }
    
  });
});