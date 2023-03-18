<?php
include "./include/datetime.php";
include  "./include/db.php";
include "./include/functions.php";
include "./include/session.php";
global $conn;
global $DateTime;
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //echo "password ${passwordverify}";
    //echo 

    $query = "SELECT * FROM users WHERE username='${username}' ";
    $execute = mysqli_query($conn, $query);
    while($datarows=mysqli_fetch_array($execute)){
        $id= $datarows["id"];
        $datetime =$datarows["datetime"];
        $username1 = $datarows["username"];
        $password1 = $datarows["password"];
        $email1 = $datarows["email"];
        $usertype = $datarows["user"];
        $firstname1 = $datarows["firstname"];
        $lastname1 = $datarows["lastname"];
    }
    if(empty($username1)){
        $_SESSION["ErrorMessage"] = "user doesnt exist create account";
        redirect_to("./login.php");
    }

    elseif (password_verify($password, $password1)) {
        // Password is correct
        //store user in session
        $_SESSION['user_id'] =  $id;
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $usertype;
        if($usertype == 0){//admin user value is 1 and normal user value is 0
            $_SESSION["SuccessMessage"]="login successful welcome mr/mrs ${firstname1}  ${lastname1}";
            redirect_to("./index.php");
        }
        elseif($usertype == 1){
            $_SESSION["SuccessMessage"]="welcome administrator";
            redirect_to("./dashboard.php");
            
        }
        else{
            $_SESSION["ErrorMessage"]="Contact administrator there is a problem  with your account";
            redirect_to("./login.php");


        }


    } else {
        // Password is incorrect
        echo "Your password is incorrect";
        $_SESSION["ErrorMessage"]="wrong password";
        redirect_to("./login.php");

    }



    

}
elseif(isset($_POST['signup'])){
    $username = $_POST['username'];
    $password = $_POST['password'] ;
    
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    echo $passwordhash."<br>";
    echo "user exists";
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $query = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `user`, `datetime`) VALUES (NULL, '${firstname}', '${lastname}', '${username}', '${email}', '${passwordhash}', '0', '${DateTime}')";
    $execute = mysqli_query($conn,$query);

    
    if(empty($execute)){
        echo "creation failed";
        $_SESSION["ErrorMessage"]="account creation failed";
        redirect_to('./login.php');
        
        
    }else{
        echo "creation successful";
        $_SESSION["SuccessMessage"]="account created successfully, login with your username and password";
        redirect_to('./login.php');
    }
}
// Check if product ID is set
elseif (isset($_POST['product_id'])) {
    
  
  
  // Add product to cart
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $username = $_POST['username'];
  $category = $_POST['category'];
  $query= "INSERT INTO `cart` (`productName`, `productId`, `username`, `category`) VALUES ('${product_name}', '${product_id}', '${username}', '${category}')";
  $execute = mysqli_query($conn, $query);
  

  
  $item = array(
    'product_id' => $product_id,
    'product_name' => $product_name,
    'username' => $username,
    'category' => $category
  );
  
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  
  $_SESSION['cart'][] = $item;
  
  echo "Product added to cart successfully. $product_name, $username, $category, $product_id";
}elseif(isset($_POST["cartItemId"])){/*to add the quantity value to the database*/
    $cartItemId = $_POST['cartItemId'];
    $quantity = $_POST['quantity'];

    // Update the quantity value in the database
    $query = "UPDATE cart SET quantity = $quantity WHERE id = $cartItemId";
    $result = mysqli_query($conn, $query);

    // If the update was successful, calculate the new total price and return it to the client
    if ($result) {
      $query = "SELECT SUM(price * quantity) AS total FROM cart WHERE username = '$username'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $total = $row['total'];
      echo $total;
    } else {
      // If the update failed, return an error message
      echo "Error updating quantity";
    }

    }
elseif(isset($_POST['cartItemId1'])){
    $cartItemId = $_POST['cartItemId1'];

    // Delete the item from the database
    $query = "DELETE FROM cart WHERE id = $cartItemId";
    $result = mysqli_query($conn, $query);

    // If the delete was successful, calculate the new total price and return it to the client
    if ($result) {
      $query = "SELECT SUM(price * quantity) AS total FROM cart WHERE username = '$username'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_assoc($result);
      $total = $row['total'];
      echo $total;
    } else {
      // If the delete failed, return an error message
      echo "Error deleting item";
    }
    
}
 
  ?>
