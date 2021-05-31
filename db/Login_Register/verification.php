<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


include "db.php";

// Tilldelar session-variabler vid inloggning
$_SESSION['username'] = $_POST['username'];

$_SESSION['userId'] = FindId($_POST['username']);

$_SESSION['email'] = FindEmail(FindId($_POST['username']));


// Kollar att username och password matchar en användare i databasen
Search(FindId($_POST['username']),  $_POST['password']);



//$_SESSION['userId'] = findId($_POST['username']);

?>