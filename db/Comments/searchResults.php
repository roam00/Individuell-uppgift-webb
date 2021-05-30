<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(!(isset($_SESSION['username']))){
    
    header('Location: login.php');
    
    die();
    echo "You have to log in to access that page";
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Show comments</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>

<ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../../comments.php">Show comments</a></li>
        <li><a href="../../writeComment.php">Write a comment</a></li>
        <li><a href="../../searchPage.php">Search for a comment</a></li>
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li style='float: right;'><a href='../../login.php'>Log in</a></li>
            <li class='right'><a href='../../register.php'>Sign up</a></li>";
        }
        if(isset($_SESSION['username'])){
            echo "<li style='float: right;'><a href='../../profile.php'>My profile</a></li>
            <li class='right'><a href='../Login_Register/logout_process.php'>Log out</a></li>";
        }
        
        ?>
    </ul>


    <div class="box" id="boxComment">
        <h1>Results </h1>
    </div>


    <?php
include "dbComments.php";
echo "<div id='center'>";

SearchForComment($_POST['search']);



echo "</div>";
?>




</body>

</html>