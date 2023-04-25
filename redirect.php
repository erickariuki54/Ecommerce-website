<?php
ob_start();

include "include/datetime.php";
include "include/db.php";
include "include/functions.php";
include "include/session.php";
global $conn;
global $DateTime;


if(isset($_POST['login'])){
  //sanitizing the code to prevent sql injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
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
        //echo "Your password is incorrect";
        $_SESSION["ErrorMessage"]="wrong password";
        redirect_to("./login.php");

    }



    

}
if(isset($_POST['signup'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  
  // Prepare a statement with parameterized query
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if($result->num_rows > 0) {
      // Username already exists
      $_SESSION["ErrorMessage"] = "Account creation failed. A similar account already exists.";
      redirect_to('./login.php');
  } else {
      // Hash the password
      $passwordhash = password_hash($password, PASSWORD_DEFAULT);

      // Prepare a statement with parameterized query
      $stmt = $conn->prepare("INSERT INTO `users` (`firstname`, `lastname`, `username`, `email`, `password`, `user`, `datetime`) VALUES (?, ?, ?, ?, ?, '0', ?)");
      $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $passwordhash, $DateTime);
      $stmt->execute();
      
      if($stmt->affected_rows > 0){
          $_SESSION["SuccessMessage"] = "Account created successfully. Login with your username and password.";
          redirect_to('./login.php');
      } else {
          $_SESSION["ErrorMessage"] = "Account creation failed. Please try again later.";
          redirect_to('./login.php');
      }
  }
}

// Check if product ID is set
elseif (isset($_POST['product_id'])) {
    
  
  
  // Add product to cart
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $username = $_POST['username'];
  $category = $_POST['category'];
  if($username == null){
    echo "you must sign in first to add items to cart";
  }else{
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
  
  echo "$product_name added to cart successfully.";
}
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
elseif(isset($GET['badgenumber'])){/*badge number */
    $query = "SELECT COUNT(*) FROM table_name WHERE username='user'";
    $execute = mysqli_query($conn, $query);

    header('Content-Type: application/json');
    echo json_encode($execute);
}
elseif(isset($_POST['query'])){/*search query*/
  $search = $_POST['query'];
  $sql = "SELECT * FROM products WHERE name LIKE '%".$search."%'";
  $result = mysqli_query($conn, $sql);
  $output = '<div class="alert alert-dismissible"><button type="button" class="close search1" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul class="list-unstyled">';
  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $output .= "<li><a href='product.php?id=${id}'>".$row['name']."</a></li>";
    }
  } else {
    $output .= '<li>No results found</li>';
  }
  $output .= '</ul></div>';
  echo $output;
  //to handle the dismiss button 
  echo "<script>$('.close').click(function() {
    $('#search').val('');
    $('#searchResults').hide();
  });</script>";

  
}
 
ob_end_flush();
?>
