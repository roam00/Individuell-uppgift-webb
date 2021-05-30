<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(!(isset($_SESSION['username']))){
    
    header('Location: ../../login.php');
    
    die();
    echo "You have to log in to access that page";
}

header("Location: ../../profile.php");

include "db.php";

PasswordChange($_POST['newPassword']);

?>