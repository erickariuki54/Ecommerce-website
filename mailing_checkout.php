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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './assets/frameworks/vendor/autoload.php'; // path to PHPMailer autoloader file, composer
if(isset($_POST['checkout'])&& $username == !null){
    //get the email from the database
    $query = "SELECT * FROM users WHERE username='$username'";
    $execute = mysqli_query($conn, $query);
    while($datarows=mysqli_fetch_array($execute)){
    $firstname = $datarows['firstname'];
    $lastname = $datarows['lastname'];
    $email = $datarows['email'];

    }
    // Recipient email address
    $to = $_POST['email'];
    
    // Email subject
    $subject = "cart items receipt for mr/mrs ${firstname} ${lastname}";
    //get cart items from the database
    $query1 = "SELECT * FROM cart WHERE username='$username'";
    $execute1 = mysqli_query($conn, $query1);
    //to send the cart items inside a table
    $message = "<table border=1 style='border-collapse: collapse; width:100%;'>";
    $message .= "<tr><th>Product</th><th>Quantity</th><th>Category</th><th>Price</th><th>Total</th></tr>";

    while($datarows1=mysqli_fetch_array($execute1)){
        $productname = $datarows1['productName'];
        $quantity = $datarows1['quantity'];
        $category = $datarows1['category'];
        $productid = $datarows1['productId'];
        //get the prices 
        $query2 = "SELECT price FROM products where id='$productid'";
        $price_result = mysqli_query($conn, $query2);
        $price_data = mysqli_fetch_array($price_result);
        $price = $price_data['price'];
        $total_price = $price * $quantity;
        $grandtotal += $total_price;
    
        // Add cart item to the message as a row in the table
        $message .= "<tr>";
        $message .= "<td>$productname</td>";
        $message .= "<td>$quantity</td>";
        $message .= "<td>$category</td>";
        $message .= "<td>$price</td>";
        $message .= "<td>$total_price</td>";
        $message .= "</tr>";

        
    }
    
    // Add closing message
    $message .= "<tr><td colspan='4' style='text-align: center;'>Grand Total:</td><td style='color: red; font-weight: bold;'>$grandtotal</td></tr>";
    $message .= "</table>";
    $message .= "<p style='text-align: center;'><b>Thank you for shopping with us!</b></p>";
    
    // PHPMailer object
    $mail = new PHPMailer(true);
    
    try {
        // SMTP server settings for Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'erickariukiwairimu@gmail.com'; // replace with your actual Gmail email address
        $mail->Password = 'sbrrceedcljiadpi'; // inapp  gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
    
        // Recipients
        $mail->setFrom('erickariukiwairimu@gmail.com', 'ROYAL TEC ONLINE SHOPPING');
        $mail->addAddress($to);
    
        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
    
        // Send email
        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        /*echo 'Error sending email: ' . $mail->ErrorInfo;*/
        echo "please check your email and try again";
    }
}
?>
