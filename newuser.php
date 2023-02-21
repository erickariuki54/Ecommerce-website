
<?php
if(isset($_POST['sub'])){
    $firstname = $_POST['fname'];
    $secondname = $_POST['lname'];
    $user = $_POST['uname'];
    $pass = $post['password'];
}


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
<link rel="stylesheet" href="assets/css/style.css">
<title>create account</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="sm-col-2">
                <?php echo $firstname;?>
                <form action="#" method="post">
                    <label for="firstname">firstname</label>
                    <input type="text" name="fname" id="firstname" class="form-control">
                    <label for="secname">last name</label>
                    <input type="text" name="lname" id="secname" class="form-control">
                    <label for="username">Username</label>
                    <input type="email" name="uname" id="username" class="form-control">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <br>
                    <input type="submit" name="sub" value="create new user" class="btn btn-primary form-control">
                </form>
            </div>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>