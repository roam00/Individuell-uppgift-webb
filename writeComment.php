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
    <script defer src="js/javaS.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
</head>

<body>

    <h2>Make a comment: </h2>
    <div id="error"></div>

    <br>
    <div class="box">
        <form id="formId" method="post" action="./db/Comments/validationComments.php">

            <label for="comment">Comment: </label><br>
            <!-- <input type="text" id="comment" name="comment"><br> -->
            <textarea name="comment" id="comment"></textarea><br>

            <button type="submit">Send</button>

        </form>

    </div>
</body>

</html>