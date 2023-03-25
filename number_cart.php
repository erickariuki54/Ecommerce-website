<?php
include "./include/db.php";
include "./include/session.php";
include "./include/functions.php";
include "./include/datetime.php";

//username and id
$userData = login();
  // Split the user data string into an array
  $userDataArray = explode(',', $userData);
  // Get the individual values from the array
  $username = $userDataArray[0];
  $usertype = $userDataArray[1];
  $user_id = $userDataArray[2];


// Connect to the database and fetch the updated badge count
// Replace 'your_database_name', 'your_username' and 'your_password' with your actual database credentials
$pdo = new PDO('mysql:host=localhost;dbname=royal_tec', 'root', 'baby');
$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM cart where username='${username}'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Return the updated badge count as a JSON response
header('Content-Type: application/json');
echo json_encode($result);
?>
