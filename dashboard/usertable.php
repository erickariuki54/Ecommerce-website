
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

<?php
$output = ob_get_clean(); // assign the output buffer to $output variable
echo $output; // output the table*/
?>

<!--the javascript files for the frameworks !-->
<?php 
framework_js()
?>
<!--to  fix the functions which were not working after the reload-->
<script>
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
        $("#users").text(data); //
        
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

</script>

  
  
  
  
