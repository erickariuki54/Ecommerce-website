<?php
include "../include/datetime.php";
include  "../include/db.php";
include "../include/functions.php";
include "../include/session.php";


if(isset($_POST["deleteproduct"])){
    $id = $_POST['id'];
    $query = "DELETE FROM products WHERE id=$id";
    $execute = mysqli_query($conn, $query);
    echo "success";
}
elseif(isset($_POST['deleteuser'])){
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id=$id";
    if( mysqli_query($conn, $query)){
        echo "success user deleted successfully";
    }
    

}

?>