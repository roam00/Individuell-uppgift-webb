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


echo "Logout success";
session_destroy();
header("Location: ../../index.php");

?>