<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="./assets/css/style.css">
<script src="./assets/frameworks/node_modules/jquery/dist/jquery.min.js"></script>
<script src="./assets/js/passwordvalidation.js?1"></script>
<title>sign up</title>
</head>
<body class="background">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 mx-auto card m-5">
                <div class="signup">
                    <form action="./redirect.php" method="post">
                        <label for="username" style="margin-top: 20px;"><i class="fa fa-user" aria-hidden="true"></i>username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <label for="email"><i class="fa fa-users" aria-hidden="true"></i> Email</label>
                        <input type="email" name="email" id="email" class="form-control"required>
                        <label for="firstname"><i class="fa fa-user-plus" aria-hidden="true"></i> First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required>
                        <label for="lastname"><i class="fa fa-user-plus" aria-hidden="true"></i> Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required>
                        <label for="password"><i class="fa fa-lock" aria-hidden="true"></i> password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <label for="password-confirm"><i class="fas fa-user-lock"></i> Confirm Password</label>
                        <input type="password" name="password-confirm" id="password-confirm" class="form-control" required>
                        <span id="password-help"></span>
                        <input type="submit" value="signup" class="btn btn-primary btn-block mt-4" name="signup" id="signup">
                        <div class="card-footer">
                            <p class="text-center">have an account ?<a href="./login.php">login</a></p>
                          </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="./assets/frameworks/node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
  function capitalizeFirstLetter(input) {
    // Convert the first character to uppercase on keyup
    input.on('keyup', function() {
      var val = input.val();
      input.val(val.charAt(0).toUpperCase() + val.slice(1));
    });
  }

  // Call the function for any input field that needs to capitalize the first letter
  capitalizeFirstLetter($('#firstname'));
  capitalizeFirstLetter($('#lastname'));
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>