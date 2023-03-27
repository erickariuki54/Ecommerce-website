<?php
include "./include/db.php";
// Create connection




// Generate 10 random accounts
for ($i = 1; $i <= 10; $i++) {
  $username = 'user' . $i;
  $password = 'password' . $i;
  $passwordhash = password_hash($password, PASSWORD_DEFAULT);
  $email = 'user' . $i . '@example.com';
  $firstname = 'First' . $i;
  $lastname = 'Last' . $i;
  $DateTime = date('Y-m-d H:i:s');

  // Check if username already exists
  $query = "SELECT * FROM `users` WHERE `username` = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 0) {
    // Insert new user into database
    $query = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `user`, `datetime`) VALUES (NULL, '$firstname', '$lastname', '$username', '$email', '$passwordhash', '0', '$DateTime')";
    mysqli_query($conn, $query);
    echo "accounts created successfully";
  }
}


?>
