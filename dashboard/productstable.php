<?php 
include "../include/datetime.php";
include  "../include/db.php";
include "../include/functions.php";
include "../include/session.php";
include "../include/css_js.php";


?>
<?php
ob_start(); // start output buffering

?>
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
    <th>delete</th>
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
    
    
  ?>
  <tr>
    <td contenteditable width="10%" data-id9="<?php echo $id ;?>"><?php echo $name ;?></td>
    <td contenteditable width="10%" data-id10="<?php echo $id ;?>"><?php echo $category ;?></td>
    <td contenteditable width="10%" data-id11="<?php echo $id ;?>"><?php echo $quantity ;?></td>
    <td contenteditable width="10%" data-id12="<?php echo $id ;?>"><?php echo $price ;?></td>
    <td contenteditable width="20%" data-id13="<?php echo $id ;?>"><?php echo $details ;?></td>
    <!--add the image-->
    <?php 
    if($category == "phones"){
      $imagepath = "./assets/images/phones/$image";
    }elseif($category == "laptops"){
      $imagepath = "./assets/images/laptops/$image";
    }else{
      $imagepath = "./assets/images/accessories/$image";
    } ?>
    <td width="20%" data-id14="<?php echo $id;?>"><img width="100%" src="<?php echo $imagepath;?>" alt="<?php echo $name; ?>"></td>
    <td width="10%" data-id15="<?php echo $id;?>"><?php echo $datetime ;?></td>
    <td width="10%" data-id16="<?php echo $id;?>"><button class="btn btn-warning deleteproducts">delete</button></td>
  </tr>
<?php } ?>
</table></div>
  <?php
    $output = ob_get_clean(); // assign the output buffer to $output variable
    echo $output; // output the table*/
    ?>