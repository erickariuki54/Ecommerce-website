<?php
include "./include/datetime.php";
include  "./include/db.php";
include "./include/functions.php";
include "./include/session.php";
global $conn;
global $DateTime;
?>
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

<title>Royal Tec Login</title>
</head>
<body class="background">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 mx-auto">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Login</h4>
                <span>
                  <?php echo SuccessMessage();
                  echo Message();?>

                </span>
              </div>
              <div class="card-body">
                <form method="post" action="./redirect.php">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <input type="submit" value="login" class="btn btn-primary btn-block mt-4" name="login">
                </form>
              </div>
              <div class="card-footer">
                <p class="text-center">Don't have an account? <a href="./signup.php">Sign up</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>