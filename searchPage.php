<?php
session_start();
if(!(isset($_SESSION['username']))){
    
    header('Location: login.php');
    
    die();
    echo "You have to log in to access that page";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Write comment</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <!--<script defer src="js/javaComment.js"></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
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
            <form id="formId" method="post" action="searchResults.php">

                <label for="search">Search: </label><br>
                <!-- <input type="text" id="comment" name="comment"><br> -->
                <input type ="text" name="search" id="search"></input><br>

                <button type="submit">Search</button>

            </form>

        </div>

    </div>

    <?php
include "html/_footer.php";
    ?>

</body>

</html>