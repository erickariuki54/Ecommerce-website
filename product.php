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
    <div class="container-fluid">
        <?php require "./include/navigation.php";?>
    </div>
           
            <div class="col-sm-10  container-fluid " style="padding-top: 70px; margin-right:40px;">
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