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

    <title>Show comments</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>

    <?php
include "html/_header.php";
?>


<div class="box" id="boxComment">
    <h1>Comment page </h1>
</div>


    <?php
     echo "<div id='center'>";

    
    include "db/Comments/dbComments.php";
    Show();

    echo "</div>";
    ?>



    <?php
include "html/_footer.php";
    ?>


</body>

</html>