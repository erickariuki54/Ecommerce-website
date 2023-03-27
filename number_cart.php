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
try {
  $pdo = new PDO('mysql:host=localhost;dbname=royal_tec', 'root', 'baby');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM cart where username=:username");
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  // Return the updated badge count as a JSON response
  header('Content-Type: application/json');
  echo json_encode($result);
} catch(PDOException $e) {
  // Handle database errors
  echo "Error fetching badge count: " . $e->getMessage();
}

?>
