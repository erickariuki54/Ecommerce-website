<?php 
require_once "include/db.php";
require_once "include/session.php";
require_once "include/functions.php";
require_once "include/datetime.php";
require_once 'include/css_js.php';/*css and js files for bootstrap and jquery*/

//username and id
$userData = login();
// Split the user data string into an array
$userDataArray = explode(',', $userData ?? '');
// Get the individual values from the array
$username = $userDataArray[0] ?? '';
$usertype = $userDataArray[1] ?? '';
$user_id = $userDataArray[2] ?? '';



  


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<?php framework_css()?><!-- css files -->
<link rel="stylesheet" href="./assets/css/style.css">

<style>
    
/*bring the text forward*/
.navbar {
  z-index: 999;
}
@media (min-width:800px){
  .table1{
    margin-left:12% ;
  }
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
<!--if the username is not empty to view the page-->
<?php 
if($username == !null){
?> 
           
            
  <div class="container-fluid mt-5" style="padding-top: 70px;">
    <div class="row">
      
      <div class="col-sm-8">
        <table class="table table1  text-dark table-hover table-responsive"><!--cart table start-->
          <thead>
            <tr>
              <th scope="col">S/No</th>
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
            <a href="./checkout.php" class="btn btn-primary">Checkout </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }else{
    ?>
    <!--if the username is null-->
    <div class="container" style="padding-top: 70px;">
      
      <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>error</strong> you must login first to view this page
      </div>
      <?php } ?>
      
    </div>
  

<?php framework_js()?><!--frameworks javascript files-->

<script src="./assets/js/cart.js?2">
</script>

</body>
</html>