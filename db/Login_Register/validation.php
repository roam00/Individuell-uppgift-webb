<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


$errors = array();

include "db.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isUserInDB($_POST['username'])){
        $errors['username2'] = "Username already in use. ";
    }

    if(isEmailInDB($_POST['email'])){
        $errors['email2'] = "Email already in use. ";
    }

    if(0 === preg_match("/\S+/", $_POST['username'])){
        $errors['username'] = "You must enter an username. ";
    }

    if(0 === preg_match("/\S+@\S+\.\S+/", $_POST['email'])){
        $errors['email'] = "You must enter a valid email. ";
    }

    if(0 === preg_match("/\S+/", $_POST['password'])){
        $errors['password'] = "You must enter a password. ";
    }

    if(0 === count($errors)){
        header('Location: ../../index.php');
        unset($_SESSION['error']);
        $_SESSION['username'] = $_POST['username'];
        
        InsertIntoDatabase(SaltGeneration());
        $_SESSION['userId'] = FindId($_POST['username']);
        $_SESSION['email'] = FindEmail(FindId($_POST['username']));
    }
    else{
        header('Location: ../../register.php');
        $_SESSION['error'] = $errors;
    }
}

?>