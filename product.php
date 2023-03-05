<?php 
include "./include/datetime.php";
include './include/db.php';
include './include/functions.php';
include './include/session.php';

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="./assets/css/style.css">
<title><?php echo $name;?></title>
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
                                <a class="nav-link" href="./login.php"><i class="fa fa-sign-in-alt" aria-hidden="true"></i> sign up</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i>cart</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
           
            <div class="sm-col-10  container-fluid" style="padding-top: 70px;">
                <h1><?php echo $name;?></h1>

                <?php
                if($category == "phones"){
                    echo "<img src='./assets/images/phones/${image}' alt='${name}' width='50%' height='50%'>";
                }elseif($category == "laptops"){
                    echo "<img src='./assets/images/laptops/${image}' alt='${name}' width='50%' height='50%'>";

                }else{
                    echo "<img src='./assets/images/accessories/${image}' alt='${name}' width='50%' height='50%'>";
                }
                ?>
                
                <h2>product description</h2>
                <p><?php echo $details;?></p>
                <button class="btn btn-primary "> ksh <?php echo $price;?>  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
            </div></div></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>