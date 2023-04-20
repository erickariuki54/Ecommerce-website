<?php 
function redirect_to($New_Location){
    //header("Refresh: 0; url=$New_Location");
    header("location:".$New_Location);
    exit;
}
?>