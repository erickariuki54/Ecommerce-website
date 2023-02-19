<?php

 session_start();   
 function Message(){
    if(isset($_SESSION["ErrorMessage"])){
        $Output="<div class='alert alert-danger'>";
        $Output.=htmlentities($_SESSION["ErrorMessage"]);
        $Output.="</div>";
        $_SESSION["ErrorMessage"]=null;
        return $Output;
    }

 }
 function SuccessMessage(){
    if(isset($_SESSION["SuccessMessage"])){
        $Output="<div class='alert alert-success'>";
        $Output.=htmlentities($_SESSION["SuccessMessage"]);
        $Output.="</div>";
        $_SESSION["SuccessMessage"]=null;
        return $Output;
    }
 }
 // check if the user has submitted the login form
 function Login(){
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // verify the login credentials
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username === 'user' && $password === 'password') {
        // if the login credentials are valid, store the user details in the session
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        // redirect the user to the home page or any other page
        header('Location: home.php');
        exit;
        } else {
            // if the login credentials are invalid, display an error message
            echo 'Invalid username or password.';
        }
    }

    // check if the user is logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        // the user is logged in, display a welcome message
        echo 'Welcome, ' . $_SESSION['username'] . '!';
    } else {
        // the user is not logged in, display the login form
        echo '<form method="post" action="">
              <label for="username">Username:</label>
              <input type="text" name="username" id="username">
              <br>
              <label for="password">Password:</label>
              <input type="password" name="password" id="password">
              <br>
              <button type="submit">Login</button>
          </form>';
    }
    }


?>
