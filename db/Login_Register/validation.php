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

    // Ser till att username är icketom och ej whitespace
    if(0 === preg_match("/\S+/", $_POST['username'])){
        $errors['username'] = "You must enter an username. ";
    }

    // Ser till att emailen skrivs i rätt format
    if(0 === preg_match("/\S+@\S+\.\S+/", $_POST['email'])){
        $errors['email'] = "You must enter a valid email. ";
    }

    // Ser till att password är icketom och ej whitespace
    if(0 === preg_match("/\S+/", $_POST['password'])){
        $errors['password'] = "You must enter a password. ";
    }

    // Om errors är lika med 0, gör detta
    if(0 === count($errors)){
        header('Location: ../../index.php');
        unset($_SESSION['error']);
        $_SESSION['username'] = $_POST['username'];
        
        // Lägger in användaren i databasen
        InsertIntoDatabase(SaltGeneration());

        // Skapar session-variablar och tilldelar dom värden
        $_SESSION['userId'] = FindId($_POST['username']);
        $_SESSION['email'] = FindEmail(FindId($_POST['username']));
    }
    else{

        // Skickar oss tillbaka till register där errorsen printas ut
        header('Location: ../../register.php');
        $_SESSION['error'] = $errors;
    }
}

?>