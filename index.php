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
<link rel="stylesheet" href="./assets/css/style.css">
<!--owl carousel css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  require "./include/navigation.php";
  ?>
</div>   
           
            <div class=" container-fluid col-sm-10 "style="padding-top: 70px;">
            <div class="col-sm-2"><!--placeholder for col-sm-2--></div>
            <span>
                <?php echo Message();
                 echo SuccessMessage();
               ?></span>
               
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
                          <a class="btn btn-primary btn-lg btn-block" href="#" role="button">ksh <?php echo $price; ?></a>
                        </div>
                      </div></div>
                      <?php  }?>
                    
                  </div>
                  <?php Login();?>
                  
                  
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<!--add to cart fix to avoid reloading the page each time a product is added-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function addToCart(product_id,product_name,username,category) {
  $.ajax({
    type: "POST",
    url: "redirect.php",
    data: {product_id: product_id, product_name: product_name, username: username, category: category},

    success: function(response) {
      alert(response);
    }
  });
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<!--owl carousel js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./style.js"></script>
<script src="./assets/js/cart.js"></script>
</body>
</html>