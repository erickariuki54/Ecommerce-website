<?php 
include "./include/db.php";
include "./include/session.php";
include "./include/functions.php";
include "./include/datetime.php";




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
<link rel="stylesheet" href="./style.css">
<!--owl carousel css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>ecommerce &copy;</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="sm-col-2 md-col-2 lg-col-2">
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                    <a class="navbar-brand" style="color:blue; font-size:30px;">Royal Technologies</a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;"><i class="fa fa-book" aria-hidden="true"></i> categories</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#phones"><i class="fa fa-phone" aria-hidden="true"></i> Phones</a>
                                    <a class="dropdown-item" href="#laptops"><i class="fa fa-laptop" aria-hidden="true"></i> laptops</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#tab4Id"> accessories</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> sign up</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>cart</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
           
            <div class="sm-col-10  container-fluid" style="padding-top: 70px;">
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
                          <a class="btn btn-primary btn-lg" href="product.php?id=<?php echo $id;?>" role="button">ksh <?php echo $price; ?></a>
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
                          <a class="btn btn-primary btn-lg" href="#" role="button">ksh <?php echo $price; ?></a>
                        </div>
                      </div></div>
                      <?php  }?>
                    
                  </div>
                  <?php Login();?>
                  
                  
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<!--owl carousel js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./style.js"></script>
</body>
</html>