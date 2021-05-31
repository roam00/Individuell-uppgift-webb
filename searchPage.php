<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(!(isset($_SESSION['username']))){
    
    header('Location: ../../login.php');
    
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Search page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
include "html/_header.php";
?>

    <div class="formDiv" id="textDiv">

        <h2>Search for a comment: </h2>
        <div id="error"></div>

        <br>
        <div class="box">
            <form id="formId" method="post" action="db/Comments/searchResults.php">

                <label for="search">Search: </label><br>
                <!-- <input type="text" id="comment" name="comment"><br> -->
                <input type="text" name="search" id="search"></input><br>

                <button type="submit">Search</button>

            </form>

        </div>

    </div>



</body>

</html>