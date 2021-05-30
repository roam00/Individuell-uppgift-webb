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
?>

<!DOCTYPE html>
<html>

<head>

    <title>Show comments</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="js/jQuery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>

    <?php
include "html/_header.php";
?>


<div class="box" id="boxComment">
    <h1>Comment page </h1>
</div>


<div id="showData"></div>



    


</body>

</html>