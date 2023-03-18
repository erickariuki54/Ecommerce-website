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
<link rel="stylesheet" href="./assets/css/style.css?4">
<!--owl carousel css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    
/*bring the text forward*/
.navbar {
  z-index: 999;
}

</style>

<title>ecommerce &copy;</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 collapse"id="side" >
        <div class="navbar navbar-dark position-fixed bg-dark"  >
            <ul class="navbar-nav" style="height: 500px;">
                <li class="nav-item">categories</li>
                <li class="nav-item"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Phones</a></li>
                <li class="nav-item"><a href="#"> <i class="fa fa-laptop" aria-hidden="true"></i> laptops</a></li>
                <li class="nav-item"><a href="#"><i class="fas fa-toolbox    "></i> accessories</a></li>
            </ul>
        </div>
      </div>
      <div class="col-sm-10 "> 
        <div class="nav">
              
              <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed" style="width: 100%;">
                  <button data-toggle="collapse" data-target="#side"><i class="fas fa-dice-three    "></i>

                  </button>
                  <a class="navbar-brand" style="color:blue; font-size:30px;">Royal Technologies</a>
                  <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div id="my-nav" class="collapse navbar-collapse">
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item active">
                              <a class="nav-link" href="./index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;"><i class="fa fa-book" aria-hidden="true"></i> categories</a>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="./index.php?#phones"><i class="fa fa-phone" aria-hidden="true"></i> Phones</a>
                                  <a class="dropdown-item" href="./index.php?#laptops"><i class="fa fa-laptop" aria-hidden="true"></i> laptops</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#tab4Id"> accessories</a>
                              </div>
                          </li>
                          <li class="nav-item active">
                              <a class="nav-link" href="./login.php"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> sign up</a>
                          </li>
                          <li class="nav-item active">
                              <a class="nav-link" href="./cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i>cart <div class="badge badge-warning">1</div></a>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
           
            
  <div class="container-fluid mt-5" style="padding-top: 70px;">
    <div class="row">
      
      <div class="col-sm-8">
        <table class="table table-striped table-fluid"><!--cart table start-->
          <thead>
            <tr>
              <th scope="col">S/No <?php echo $username;?></th>
              <th scope="col">Product Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Total</th>
              <th scope="col"> Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $query = "SELECT * FROM cart WHERE username='${username}'";
            $execute = mysqli_query($conn, $query);
            $sno = 0;
            while($datarows=mysqli_fetch_array($execute)){
              $id= $datarows["id"];
              $datetime =$datarows["datetime"];
              $productName =$datarows["productName"];
              $productId = $datarows["productId"];
              $category =$datarows["category"];
              $quantity = $datarows["quantity"];
              $sno++;/*to add the serial number with an increment of 1 */

              $query1 = "SELECT * FROM products WHERE id='${productId}'";
              $execute1 = mysqli_query($conn, $query1);
             
              while($datarows1=mysqli_fetch_array($execute1)){
                $id1= $datarows1["id"];
                $datetime1 =$datarows1["datetime"];
                $name1 =$datarows1["name"];
                $category1 =$datarows1["category"];
                $quantity1 =$datarows1["quantity"];
                $image1 =$datarows1["image"];
                $price =$datarows1["price"];
                $details1 = $datarows1["description"];
                

            }
            ?>
            <tr>
              <th scope="row"><?php echo $sno; ?></th>
              <td><?php echo $productName;; ?></td>
              <td><input type="number" class="form-control" min="0" value="<?php echo $quantity; ?>" max="10" data-id="<?php echo $id; ?>"></td>
              <td><?php echo $price; ?></td>
              <td><?php echo $price; ?></td>
              <td><button type="button" class="btn btn-danger delete-item" data-id="<?php echo $id; ?>">Delete</button></td>

            </tr><?php }?>
            
          </tbody>
        </table>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cart Summary</h5>
            <p class="card-text">Total Quantity: <span id="total-quantity">KSHS.0</span></p>
            <p class="card-text">Total Amount: <span id="total-amount">KSHS. 0</span></p>
            <a href="#" class="btn btn-primary">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="./assets/js/cart.js">
</script>

</body>
</html>