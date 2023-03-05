<?php

 session_start();   
 function Message(){
    if(isset($_SESSION["ErrorMessage"])){
        $Output="<div class='alert alert-danger'>";
        $Output.=htmlentities($_SESSION["ErrorMessage"]);
        $Output.="</div>";
        $_SESSION["ErrorMessage"]=null;
        return $Output;
    }

 }
 function SuccessMessage(){
    if(isset($_SESSION["SuccessMessage"])){
        $Output="<div class='alert alert-success'>";
        $Output.=htmlentities($_SESSION["SuccessMessage"]);
        $Output.="</div>";
        $_SESSION["SuccessMessage"]=null;
        return $Output;
    }
 }
 // check if the user has submitted the login form
 function login(){
    if(isset($_SESSION["username"])){
        $user_id = null;
        $username = null;
        $usertype = null;

        // Save the user data in the session
         $user_id = $_SESSION['user_id'] ;
         $username = $_SESSION['username'] ;
         $usertype = $_SESSION['usertype'] ;
        return $username.",".$usertype.",".$user_id;
    }}