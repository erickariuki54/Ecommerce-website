<?php
include "./include/db.php";
include "./include/session.php";
include "./include/functions.php";
include "./include/datetime.php";

// Get the logged in user's username and id
$userData = login();
$userDataArray = explode(',', $userData);
$username = $userDataArray[0];

// Connect to the database and fetch the updated badge count
if(isset($_GET['cartupdate'])){
  $query = "SELECT * FROM cart WHERE username='$username'";
  $execute = mysqli_query($conn, $query);
  $count= 0;
  while($row = mysqli_fetch_array($execute)){
    $cartid = $row['id'];
    $count++;
  }
  echo $count;
}
?>
