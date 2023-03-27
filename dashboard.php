<?php
include "./include/datetime.php";
include  "./include/db.php";
include "./include/functions.php";
include "./include/session.php";
include "./include/css_js.php";

global $conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<?php framework_css()?>
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
            <li class="nav-item "> <a class="nav-link" href="./login.php"><i class="fa fa-sign-out-alt" aria-hidden="true"></i>sign out</a></li>


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
        <p id="users" class="bg-warning position-sticky" style="position: sticky;
  top: 0px;">user</p>
        
        
          
        <div id="usertable">
        <table class="table table-responsive bg-success">
          <tr>
            <th>username</th>
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
            $balance = $datarows["balance"];

          
          ?>
          <tr>
            <td  width="10%" data-id1="<?php echo $id;?>"><?php echo $username ;?></td>
            <td contenteditable width="10%" data-id2="<?php echo $id;?>" class="firstname"><?php echo $firstname ;?></td>
            <td contenteditable width="10%" data-id3="<?php echo $id;?>" class="lastname"><?php echo $lastname ;?></td>
            <td contenteditable width="20%" data-id4="<?php echo $id;?>" class="email"><?php echo $email;?></td>
            <td contenteditable width="10%" data-id5="<?php echo $id;?>" class="balance"><?php echo $balance ;?></td>
            <td contenteditable width="10%" width="20%" data-id6="<?php echo $id;?>"class="user"><?php if($user == 1){
              $usertype = "admin";
              $uservalue = 1;
            }else{
              $usertype = "customer";
              $uservalue = 0;
            }
            ?><select name="customer" class="usertype" data-id6="<?php echo $id;?>">
              <!--to save the default value of the user -admin/customer -->
              <option hidden selected value="<?php echo $uservalue; ?>"><?php echo $usertype; ?></option>
              <option value="0">Customer</option>
              <option value="1">Admin</option>
            </select></td>
            <td  data-id7="<?php echo $id;?>" width="20%" data-id6="<?php echo $id;?>"><?php echo $datetime ;?></td>
            <td  data-id8="<?php echo $id;?>" ><button class="btn btn-warning deleteusers">delete</button></td>
          </tr>
          <?php }?>
        </table>
        </div>
        <div class="products">
          <h4>products</h4>
          <p id="products" class="bg-warning position-sticky" style="position: sticky;top: 0px;"> products</p>
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
              <td contenteditable width="10%" data-id9="<?php echo $id ;?>"  class="name"><?php echo $name ;?></td>
              <td  width="10%" data-id10="<?php echo $id;?>" ><select class="category" data-id10="<?php echo $id;?>" name="category" id="category">
                <option hidden selected value="<?php echo $category ;?>"><?php echo $category ;?></option>
                <option value="phones">phones</option>
                <option value="laptops">laptops</option>
                <option value="acessories">acessories</option>
              </select></td>
              <td contenteditable width="10%" data-id11="<?php echo $id ;?>" class="quantity"><?php echo $quantity ;?></td>
              <td contenteditable width="10%" data-id12="<?php echo $id ;?>" class="price"><?php echo $price ;?></td>
              <td contenteditable width="20%" data-id13="<?php echo $id ;?>" class="description"><?php echo $details ;?></td>
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

            </table>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
<!--the javascript files for the frameworks !-->
<?php 
framework_js()
?>
<!--to handle the delete button and the edits-->
<script>
  
  /*delete users*/
  $(".deleteusers").on("click", function(){
    var userselect = confirm("Are you sure you want to delete");
    
    if(userselect == true) {
      var id = $(this).closest("td").data("id8");


      
      $.ajax({
        url: './dashboard/delete.php',
        method: "POST",
        data:{id:id, deleteuser:1},
        dataType:"text",
        success:function(data){
          alert(data);
          
        }
      });
    }
    usertable();
  })
  
  function editdata(id, text,column_name, table_name){
    $.ajax({
      url: "./dashboard/edit.php",
      method: "POST",
      data: {id:id, text:text, column_name:column_name, table:table_name},
      dataType: "text",
      success: function(data){
        if(table_name == "users"){
          $("#users").text(data); //display the output in the id=users div
        }else{
          $("#products").text(data); //display the output in the id=products div
        }
        
      }
    });
  }
  /*updating users*/
  //firstname data-id2
  $(".firstname").on("blur", function(){
    var id = $(this).closest("td").data("id2");
    var text = $(this).text();
    editdata(id, text, "firstname", "users");

  });
  //lastname data-id3
  $(".lastname").on("blur", function(){
    var id = $(this).closest("td").data("id3");
    var text = $(this).text();
    editdata(id, text, "lastname", "users");

  });
  //email data_id4
  $(".email").on("blur", function(){
    var id = $(this).closest("td").data("id4");
    var text = $(this).text();
    editdata(id, text, "email", "users");

  });
  //balance data_id5
  $(".balance").on("blur", function(){
    var id = $(this).closest("td").data("id5");
    var text = $(this).text();
    editdata(id, text, "balance", "users");

  });
  //usertype data-id6
  $(".usertype").on("change", function(){
    var id = $(this).closest("select").data("id6");
    var text = $(this).val();
    
    editdata(id, text, "user", "users");

  });
  //usertable updating
  function usertable(){
    $.ajax({
      url: "./dashboard/usertable.php",
      data:{table: "users"},
      success:function(data){
        $("#usertable").html(data);
      }
    });
  }
  //products table data_id----------------------------------------------------------------
  //delete products table data_id16
  $(".deleteproducts").on("click", function(){
    var userselect = confirm("Are you sure you want to delete");
    
    if(userselect == true) {
      var id = $(this).closest("td").data("id16");


      
      $.ajax({
        url: './dashboard/delete.php',
        method: "POST",
        data:{id:id, deleteproduct:1},
        dataType:"text",
        success:function(data){
          alert(data);
          
        }
      });
    }
  })
  //update name data_id9
  $(".name").on("blur", function(){
    var id = $(this).closest("td").data("id9");
    var text = $(this).text();
    
    editdata(id, text, "name", "products");

  });
  //update category data_id10
  $(".category").on("change", function(){//it is a drop down
    var id = $(this).closest("select").data("id10");
    var text = $(this).val();
    
    editdata(id, text, "category", "products");

  });
  //update quantity data_id11
  $(".quantity").on("blur", function(){
    var id = $(this).closest("td").data("id11");
    var text = $(this).text();
    
    editdata(id, text, "quantity", "products");

  });
  //update price data_id12
  $(".price").on("blur", function(){
    var id = $(this).closest("td").data("id12");
    var text = $(this).text();
    
    editdata(id, text, "price", "products");

  });
  //description data_id13
  $(".description").on("blur", function(){
    var id = $(this).closest("td").data("id13");
    var text = $(this).text();
    
    editdata(id, text, "description", "products");

  });



  


    

  
</script>
</body>
</html>
