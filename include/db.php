<?php
$host="localhost";
$username="root";
$password="baby";
$database="royal_tec";

$conn = mysqli_connect($host,$username,$password,$database);

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
?>