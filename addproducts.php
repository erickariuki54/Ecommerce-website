<?php 
include "./include/db.php";
include "./include/session.php";
include "./include/functions.php";
include "./include/datetime.php";
global $DateTime;
global $conn;
global $name;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $Image=$_FILES["image"]['name'];
    if($category == "laptops"){
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/laptops/". $_FILES['image']['name']);

    }
    elseif($category == "phones"){
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/phones/". $_FILES['image']['name']);
    }
    else{
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/images/accessories/". $_FILES['image']['name']);

    }
   
    $Query = "INSERT INTO `products` (`name`, `quantity`, `price`, `description`, `image`, `datetime`, `category`) VALUES ('$name', '$quantity', '$price', '$description', '$Image', '$DateTime', '$category')";
    $result = mysqli_query($conn,$Query);
    if($result){
        $_SESSION["SuccessMessage"]="Post Added Successfully";
        
        
    }else{
        $_SESSION["ErrorMessage"]="something went wrong...Try Again!!";
        
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
<link rel="stylesheet" href="assets/css/style.css">
<title>addproducts</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="sm-col-2">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" style="color: rgb(102, 145, 180);">Royal Technologies</a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fa fa-book" aria-hidden="true"></i> categories </a>
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
            <span>
                <?php 
                echo SuccessMessage();
                echo Message();
                ?>
            </span>
                <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">


                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="quantity">Quantity Available</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="phones">phones</option>
                        <option value="laptops">Laptops</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">product details</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="submit" name="submit" class="btn btn-primary form-control">
                </div>
            </form>
                <h1>test</h1>
                <p>
                    <?php echo $name;
                    echo $_FILES['image'];
                    

                    ?>
                    
                </p>

            </div>
                    
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>