<?php


header('Location: ../register.php');

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
        session_start();
        unset($_SESSION['error']);
        $_SESSION['username'] = $_POST['username'];
        AddComment(SaltGeneration());
    }
    else{

        session_start();
        $_SESSION['error'] = $errors;
    }
}


?>