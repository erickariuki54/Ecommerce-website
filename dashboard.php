<?php
include "./include/datetime.php";
include  "./include/db.php";
include "./include/functions.php";
include "./include/session.php";

global $conn;
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

<title>admin</title>
<style>
  
</style>
</head>
<body>
  <div class="container-fluid">
  <h1 class="text-center">administrator</h1>
    
    <div class="row">
      <div class="col-sm-2 position-fixed "style="width: 100%;height: 100%;">
        <div class="navbar bg-dark ">
          <ul class="navbar-nav  ">
            <li class="nav-item "> <a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i>users</a></li>
            <li class="nav-item "> <a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i>add users</a></li>
            <li class="nav-item "> <a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i>remove users</a></li>
            
            <li class="nav-item"> <a class="nav-link" href="#">products</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">add products</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">remove products</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">previous purchases</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">failed purchases</a></li>
            
          </ul>
        </div>
      </div>
      <div class="col-sm-10  bg-light " style="left: 17%; ">
        <div class="navbar navbar-expand-sm  ">
          <ul class="navbar-nav ">
            <li class="nav-item "> <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
            <li class="nav-item "> <a class="nav-link" href="#"><i class="fas fa-toolbox    "></i>tools</a></li>
            <li class="nav-item "> <a class="nav-link" href="#"><i class="fa fa-sign-out-alt" aria-hidden="true"></i>sign out</a></li>


          </ul>
        </div>
      </div>
    </div>
    <div class="row" >
      <div class="col-sm-2">
        <!---->
      </div>
      <div class="col-sm-10 " >
        <h1>users</h1>
        <table class="table table-responsive bg-success">
          <tr>
            <th><i class="fa fa-users" aria-hidden="true"></i>username</th>
            <th>firstname</th>
            <th>last Name</th>
            <th>email</th>
            <th>Amount(ksh)</th>
            <th>type of user</th>
            <th>account created on</th>
          </tr>
          <?php 

          $query = "SELECT * FROM users";

          $execute = mysqli_query($conn, $query);
          while($datarows=mysqli_fetch_array($execute)){
            $id= $datarows["id"];
            $datetime =$datarows["datetime"];
            $firstname = $datarows["firstname"];
            $lastname = $datarows["lastname"];
            $email = $datarows["email"];
            $user = $datarows["user"];
            $username = $datarows["username"];

          
          ?>
          <tr>
            <td><?php echo $username ;?></td>
            <td><?php echo $firstname ;?></td>
            <td><?php echo $lastname ;?></td>
            <td><?php echo $email;?></td>
            <td><?php echo 100 ;?></td>
            <td><?php if($user == 1){
              echo "admin";
            }else{
              echo "customer";
            }?></td>
            <td><?php echo $datetime ;?></td>
          </tr>
          <?php }?>
        </table>
        <div class="products">
          <h4>products</h4>
          <div class="table ">
            <table class="bg-success">
              <tr>
              <th>product name</th>
              <th>product category</th>
              <th>quantity available</th>
              <th>price</th>
              <th>description</th>
              <th>image</th>
              <th>time modified</th>
            </tr>
            <?php 
            $query = "SELECT * FROM products";
            $execute = mysqli_query($conn,$query);
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
            <tr>
              <td><?php echo $name ;?></td>
              <td><?php echo $category ;?></td>
              <td><?php echo $quantity ;?></td>
              <td><?php echo $price ;?></td>
              <td><?php echo $details ;?></td>
              <td><?php echo $image ;?></td>
              <td><?php echo $datetime ;?></td>

            </tr>

            <?php } ?>

            </table>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
