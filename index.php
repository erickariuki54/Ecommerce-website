<?php
ob_start(); // start output buffering

/*ini_set('display_errors', 1);
error_reporting(E_ALL);*/

require_once "include/db.php";
require_once "include/session.php";
require_once "include/functions.php";
require_once "include/datetime.php";
require_once 'include/css_js.php';

//username and id
$userData = login();
// Split the user data string into an array
$userDataArray = explode(',', $userData ?? '');
// Get the individual values from the array
$username = $userDataArray[0] ?? '';
$usertype = $userDataArray[1] ?? '';
$user_id = $userDataArray[2] ?? '';

//var_dump($userData);
//var_dump($usertype);

if($usertype == 1){
  redirect_to('./dashboard.php');
}elseif($usertype == null){
  //header("Refresh: 1; url=./login.php");

  redirect_to('./login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<?php framework_css()?>
<link rel="stylesheet" href="./assets/css/style.css">

<style>
    
/*bring the text forward*/
.navbar {
  z-index: 999;/*to bring forward the text instead of the back */ 
}

</style>

<title>ecommerce &copy;</title>
</head>
<body>
<div>
  <!-- Navigation-->
  <?php 
  require "include/navigation.php";
  ?>
</div>   
           
            <div class=" container-fluid col-sm-10 "style="padding-top: 70px;">
            <div class="col-sm-2"><!--placeholder for col-sm-2--></div>
            <div id="message" class="position-fixed bg-warning" style="z-index: 999; width:100%;">
            
                <?php echo Message();
                 echo SuccessMessage();
               ?></div>
               
                <!--banner-->
                
                
                <div class="owl-carousel owl-carousel-1" style="color: aliceblue;">
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid" style="background-image: url('./assets/images/banners/banner1.jpg');">
                            <div class="container">
                              <h1 class="display-4">Welcome to My Website</h1>
                              <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                              <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                            </div>
                          </div>
                          
                    </div>
                    <div class="item">
                        <div class="jumbotron jumbotron-fluid" style="background-image: url('./assets/images/banners/banner2.jpeg');">
                            <div class="container">
                              <h1 class="display-4">Welcome to My Website</h1>
                              <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                              <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                            </div>
                          </div>
                          
                    </div>
                    <div class="item"><div class="jumbotron jumbotron-fluid" style="background-image: url('./assets/images/banners/banner3.PNG');">
                        <div class="container">
                          <h1 class="display-4">Welcome to My Website</h1>
                          <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </div>
                      </div>
                      </div>
                    
                  </div>
                  
                  <!--phone-->
                  <h2 id="phones">phones</h2>
                  <div class="owl-carousel owl-carousel-2">
                  <?php $viewQuery= "SELECT * FROM products WHERE category='phones'" ;
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
                                //limit the number of words in the description
                                if(strlen($details)>150){
                                  $details = substr($details,0,150)."<br>...";
                                }
                                //limit the product name
                                if(strlen($name)>12){
                                  $name = substr($name,0,12);
                                }
                    ?>
                                
                        <div class="item"><div class="jumbotron jumbotron-fluid" >
                        <div class="container">
                          <h1 class="display-4"><?php echo $name; ?></h1>
                          <img src="./assets/images/phones/<?php echo $image;?>" alt="<?php $name;?>" height="200px" width="100px">
                          
                          <p class="lead"><?php echo $details; ?></p>
                          <button onclick="addToCart(<?php echo $id;?>,'<?php echo $name;?>','<?php echo $username;?>' ,'<?php echo $category;?>')" class="btn btn-warning btn-block">Add to Cart</button>

                          <a class="btn btn-primary btn-lg btn-block" href="product.php?id=<?php echo $id;?>" role="button">ksh <?php echo $price; ?></a>
                        </div>
                      </div></div>
                      <?php  }?>
                  </div>
                  <!--laptops-->
                  <h2 id="laptops">laptops</h2>
                  
                  
                  
                  <div class="owl-carousel owl-carousel-2">
                    
                        <?php 
                            $viewQuery= "SELECT * FROM products WHERE category='laptops'" ;
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
                                //limit the number of words in the description
                                if(strlen($details)>150){
                                  $details = substr($details,0,150)."...";
                                }
                                //limit the product name
                                if(strlen($name)>12){
                                  $name = substr($name,0,10)."...";
                                }
                                

                            
                            
                            ?>
                        <div class="item"><div class="jumbotron jumbotron-fluid" >
                        <div class="container">
                          <h1 class="display-4"><?php echo $name; ?></h1>
                          <img src="./assets/images/laptops/<?php echo $image;?>" alt="<?php $name;?>" height="200px" width="100px">
                          
                          <p class="lead"><?php echo $details; ?></p>
                          <button onclick="addToCart(<?php echo $id;?>,'<?php echo $name;?>','<?php echo $username;?>' ,'<?php echo $category;?>')" class="btn btn-warning btn-block">Add to Cart</button>
                          <a class="btn btn-primary btn-lg btn-block" href="product.php?id=<?php echo $id;?>" role="button">ksh <?php echo $price; ?></a>
                        </div>
                      </div></div>
                      <?php  }?>
                    
                  </div>
                  <!--accessories-->
                  <h2 id="accessories">accessories</h2>
                  <div class="owl-carousel owl-carousel-2">
                    
                        <?php 
                            $viewQuery= "SELECT * FROM products WHERE category='accessories'" ;
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
                                //limit the number of words in the description
                                if(strlen($details)>150){
                                  $details = substr($details,0,150)."...";
                                }
                                //limit the product name
                                if(strlen($name)>12){
                                  $name = substr($name,0,10)."...";
                                }
                                

                            
                            
                            ?>
                        <div class="item"><div class="jumbotron jumbotron-fluid" >
                        <div class="container">
                          <h1 class="display-4"><?php echo $name; ?></h1>
                          <img src="./assets/images/accessories/<?php echo $image;?>" alt="<?php $name;?>" height="200px" width="100px">
                          
                          <p class="lead"><?php echo $details; ?></p>
                          <button onclick="addToCart(<?php echo $id;?>,'<?php echo $name;?>','<?php echo $username;?>' ,'<?php echo $category;?>')" class="btn btn-warning btn-block">Add to Cart</button>
                          <a class="btn btn-primary btn-lg btn-block" href="product.php?id=<?php echo $id;?>" role="button">ksh <?php echo $price; ?></a>
                        </div>
                      </div></div>
                      <?php  }?>
                    
                  </div>
                  <!--end of accessories-->
                  
                  <?php Login();?>
                  
                  
            </div>
        </div>
    </div>
<!--js for bootstrap and jquery-->
<?php framework_js()?>
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
      
      // select the message element
      var $message = $('#message');

      // change the message text and fade it in
      $message.text(response).fadeIn();

      // set timeout for 2 seconds
      setTimeout(function() {
        // fade out and clear the message element
        $message.fadeOut(function() {
          $(this).empty().show();
        });
      }, 2000); // 2000 milliseconds = 2 seconds
      
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



<script src="./assets/js/style.js"></script>
<script src="./assets/js/cart.js"></script>
</body>
</html>
<?php ob_end_flush();?>
