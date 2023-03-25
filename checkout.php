<?php 
include "./include/db.php";
include "./include/session.php";
include "./include/functions.php";
include "./include/datetime.php";

//username and id
$userData = login();
// Split the user data string into an array
$userDataArray = explode(',', $userData);
// Get the individual values from the array
$username = $userDataArray[0];
$usertype = $userDataArray[1];
$user_id = $userDataArray[2];
$query = "SELECT * FROM users WHERE username='$username'";
    $execute = mysqli_query($conn, $query);
    while($datarows=mysqli_fetch_array($execute)){
    $firstname = $datarows['firstname'];
    $lastname = $datarows['lastname'];
    $email = $datarows['email'];}

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
<style>
    
    /*bring the text forward*/
    .navbar {
      z-index: 999;
    }
    .cartitems{
      display: flex;
    }
    .cartitems input[type=text]{
      width: 25%;
      height: 30px;
    }
    .cartitems label{
      width: 8%;
      height: 30px;
      background-color: whitesmoke;
    }
    
    </style>
    
    <title>checkout  &copy;</title>
    </head>
    <body>
      <div>
        <!-- Navigation external for easier editing accross all pages-->
        <?php 
        require "./include/navigation.php";
        ?>
      </div>      
      <div class="container-fluid mt-5" style="padding-top: 70px;">
        <div class="row">
          <div class="col-sm-2"><!--empty two columns--></div>
          <div class="col-sm-9 ">
            <h1 style="text-align: center;">checkout items </h1>
            <div class="form bg-light">
                <form action="./mailing_checkout.php" method="post">
                  <div class="cartitems"><!--title for cart items-->
                    <label class="form-control" >s/no</label>
                    <input type="text" value="NAME" disabled>
                    <input type="text" value="PRICE" disabled>
                    <input type="text" value="QUANTITY" disabled>
                    <input type="text" value="TOTAL PRICE" disabled>
                  </div>
                  
                  <?php 
                  $query = "SELECT * FROM cart WHERE username='$username'";
                  $execute = mysqli_query($conn, $query);
                  $count = 0;
                  while($datarows=mysqli_fetch_array($execute)){
                    $id= $datarows["id"];
                    $quantity = $datarows["quantity"];
                    $productId = $datarows["productId"];
                    $query1 = "SELECT * FROM products WHERE id='$productId'";
                    $execute1 = mysqli_query($conn, $query1);
                    while($datarows1=mysqli_fetch_array($execute1)){
                      $price = $datarows1["price"];
                      

                    }
                    $total_price = $price * $quantity;
                    $grandtotal += $total_price;
                    

                    $productName = $datarows["productName"];
                    $category = $datarows["category"];
                    $count++;
                  ?>
                  <div class="cartitems">
                    <label for="item" class="form-control"><?php echo $count; ?></label>
                    <input type="text"   name="item" id="item"  disabled value="<?php echo $productName; ?>">
                    <input type="text" name="singleprice" id="single" value="<?php echo $price; ?>" disabled>
                    <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>" disabled>
                    <input type="text" style="color: red;" name="price" id="price" disabled value="<?php echo $total_price; ?>">
                    </div>
                    <?php }?>
                    <label for="email" >Email:</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                    <div class="total my-2" style="text-align: center;">
                    <label for="total"> grandTotal</label>
                    <input type="text" style="color: green;" name="total" id="total" disabled value="<?php echo $grandtotal; ?>">
                    </div>
                    <input type="submit" value="checkout" class="btn-warning my-4 form-control" name="checkout">

                    

                </form>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<!--add to jquery work with ajax-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="./assets/js/cart.js"></script>
</body>
</html>