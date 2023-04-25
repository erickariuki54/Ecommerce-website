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
<link rel="stylesheet" href="./assets/css/style.css">
<style>
    
    /*bring the text forward*/
    .navbar {
      z-index: 999;
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
            <div class="bg-light">
                
                  <div class="cartitems">
                    <table class="table bg-light table-responsive">
                      <tr>
                        <th>S/NO</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL PRICE</th>
                      </tr>
                    
                  
                  <?php 
                  $query = "SELECT * FROM cart WHERE username='$username'";
                  $execute = mysqli_query($conn, $query);
                  $count = 0;
                  $grandtotal = 0;
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
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $productName; ?></td>
                      <td><?php echo $price; ?></td>
                      <td><?php echo $quantity; ?></td>
                      <td><?php echo $total_price;?></td>
                    </tr>
                    
                    </div>
                    <?php }?>
                    <tr>
                      <th colspan="4">GRAND TOTAL</th>
                      <th style="color: green;"><?php echo $grandtotal; ?></th>

                    </tr>
                    </table>
                    <form action="./mailing_checkout.php" method="post">
                      <label for="email" >Email:</label>
                      <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
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

<script src="./assets/js/cart.js?1"></script>
</body>
</html>