<?php 
include "../include/datetime.php";
include  "../include/db.php";
include "../include/functions.php";
include "../include/session.php";


if(isset($_POST['table']) && $_POST['table'] == "users"){
    $column = $_POST['column_name'];
    $id = $_POST['id'];
    $text = $_POST['text'];
    $query = "UPDATE users SET $column = '$text' WHERE id = $id";
    
    if(mysqli_query($conn, $query)){
        if($column == "user"){
            if($text == '0'){
                echo "edited successfully to customer";
            }else{
                echo "edited successfully admin";
            }
        
        }else{
            echo "Edited successfully to $text";
        }
    
    }
}
if(isset($_POST['table']) && $_POST['table'] == "products"){
    $column = $_POST['column_name'];
    $id = $_POST['id'];
    $text = $_POST['text'];
    $query = "UPDATE products SET $column = '$text' WHERE id = $id";
    if($column == "category"){
        //previous category
        $sql = "SELECT * FROM products WHERE id = $id";
        $execute = mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($execute)){
            $category = $rows['category'];
            $image = $rows['image'];
            if($category == 'phones'){
                $path = "../assets/images/phones/$image";
                
            }elseif($category == 'laptops'){
                $path = "../assets/images/laptops/$image";
                
            }else{
                $path = "../assets/images/accessories/$image";
                
            }
        }
        if($text == 'phones'){
            $source_file = $path; // set the source file path
            $destination_file = "../assets/images/phones/$image";// set the destination file path

            if(copy($source_file, $destination_file)) {
                unlink($source_file);
                if(mysqli_query($conn, $query)){
                    echo "Edited successfully to $text and images moved successfully to $destination_file";
                    
                }
            } else {
                echo 'File move failed.';
            }



        }elseif($text == 'laptops'){
            $source_file = $path; // set the source file path
            $destination_file = "../assets/images/laptops/$image"; // set the destination file path

            if(copy($source_file, $destination_file)) {
                unlink($source_file);
                if(mysqli_query($conn, $query)){
                    echo "Edited successfully to $text and images moved successfully to $destination_file";
                    
                }
            } else {
                echo 'File move failed.';
            }

        }else{
            $source_file = $path; // set the source file path
            $destination_file = "../assets/images/accessories/$image"; // set the destination file path

            if(copy($source_file, $destination_file)) {
                unlink($source_file);
                
                if(mysqli_query($conn, $query)){
                    echo "Edited successfully to $text and images moved successfully to $destination_file";
                    
                }
            } else {
                echo 'File move failed.';
            }
        }

    }
    elseif(mysqli_query($conn, $query)){
        echo "Edited successfully to $text";
        
    }
}
?>