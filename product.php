<?php 
include "./include/datetime.php";
include './include/db.php';
include './include/functions.php';
include './include/session.php';
include './include/css_js.php';/*css and js files for bootstrap and jquery*/
//username and id
$userData = login();
// Split the user data string into an array
$userDataArray = explode(',', $userData ?? '');
// Get the individual values from the array
$username = $userDataArray[0] ?? '';
$usertype = $userDataArray[1] ?? '';
$user_id = $userDataArray[2] ?? '';

global $conn;
if(isset($_GET['id'])){
    $id1 = $_GET['id'];
    $viewQuery= "SELECT * FROM products WHERE id='$id1'" ;
    $execute = mysqli_query($conn, $viewQuery);
    while($datarows=mysqli_fetch_array($execute)){
        $id= $datarows["id"];
        $datetime =$datarows["datetime"];
        $name =$datarows["name"];
        $category =$datarows["category"];
        $quantity =$datarows["quantity"];
        $image =$datarows["image"];
        $price =$datarows["price"];
        $details = $datarows["description"];
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<?php framework_css();?>
<link rel="stylesheet" href="./assets/css/style.css">
<title><?php echo $name;?></title>
</head>
<body>
    <div class="container-fluid">
        <?php require "./include/navigation.php";?>
    </div>
           
            <div class="col-sm-10  container-fluid " style="margin-top:70px;">
                <h1><?php echo $name;?></h1>
                <div class="productimg " style="margin-left:40%;">

                <?php
                if($category == "phones"){
                    echo "<img src='./assets/images/phones/${image}' alt='${name}' width='50%' height='50%'>";
                }elseif($category == "laptops"){
                    echo "<img src='./assets/images/laptops/${image}' alt='${name}' width='50%' height='50%'>";

                }else{
                    echo "<img src='./assets/images/accessories/${image}' alt='${name}' width='50%' height='50%'>";
                }
                ?>
                </div>
                <div class="description">
                
                <h2>product description</h2>
                <p><?php echo $details;?></p>
                <button onclick="addToCart(<?php echo $id;?>,'<?php echo $name;?>','<?php echo $username;?>' ,'<?php echo $category;?>')" class="btn btn-warning btn-block "> ksh <?php echo $price;?>  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                <br>
                </div>
            </div>
        </div>
    </div>

<?php framework_js();?>
<script src="./assets/js/cart.js?3"></script>
<script>
  $(document).ready(function() {
  updateCartBadge();
});
function addToCart(product_id,product_name,username,category) {
  $.ajax({
    type: "POST",
    url: "redirect.php",
    data: {product_id: product_id, product_name: product_name, username: username, category: category},

    success: function(response) {
      //alert(response);
      updateCartBadge();
    }
  });
  
}
function updateCartBadge() {
  // Send an AJAX request to fetch the updated badge count from the server
  $.ajax({
    url: 'number_cart.php',
    type: 'GET',
    data:{cartupdate:1},
    
    success: function(response) {
      // Update the cart badge value with the updated count
      $('.cart-badge').text(response);
    },
    error: function(xhr, status, error) {
      console.log('Error fetching badge count:', error);
    }
  });
}
</script>
</body>
</html>