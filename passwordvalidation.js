$(document).ready(function() {
    // Listen for changes in the password input field
    $('#password').on('keyup', function() {
      var password = $(this).val();
      var passwordConfirm = $('#password-confirm').val();
      
      // Check if password meets requirements
      if (password.length < 8) {
        $('#password-help').text('Password must be at least 8 characters');
      } else if (password.search(/[a-z]/) == -1) {
        $('#password-help').text('Password must contain at least one lowercase letter');
      } else if (password.search(/[A-Z]/) == -1) {
        $('#password-help').text('Password must contain at least one uppercase letter');
      } else if (password.search(/[0-9]/) == -1) {
        $('#password-help').text('Password must contain at least one number');
      } else {
        $('#password-help').text('');
      }
      
      // Check if passwords match
      if (password != passwordConfirm) {
        $('#password-confirm').get(0).setCustomValidity('Passwords do not match');
      } else {
        $('#password-confirm').get(0).setCustomValidity('');
      }
    });
    
    // Listen for changes in the confirm password input field
    $('#password-confirm').on('keyup', function() {
      var password = $('#password').val();
      var passwordConfirm = $(this).val();
      
      // Check if passwords match
      if (password != passwordConfirm) {
        $('#password-confirm').get(0).setCustomValidity('Passwords do not match');
      } else {
        $('#password-confirm').get(0).setCustomValidity('');
      }
    });
  });
  