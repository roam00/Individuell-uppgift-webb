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
    <script defer src="./js/javaS.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
</head>

<body>
    <div class="box">
        <a href="comments.php">See other comments</a>
    </div>

    <h2>Skapa ett inlägg: </h2>
    <div id="error"></div>

    <div class="box">
        <form id="formId" method="post" action="./db/Comments/validationComments.php">

            <label for="name1">Namn: </label><br>
            <input type="text" id="name1" name="name1">
            <br>


            <label for="email">Emailaddress: </label><br>
            <input type="text" id="email" name="email"><br><br>


            <label for="comment">Inlägg: </label><br>
            <!-- <input type="text" id="comment" name="comment"><br> -->
            <textarea name="comment" id="comment"></textarea><br>

            <button type="submit">Skicka</button>


        </form>


    </div>
</body>

</html>