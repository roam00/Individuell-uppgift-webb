<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title> Home </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
include "html/_header.php";
?>




    <h1> Hi <?php echo $_SESSION['username']; ?> </h1>



    <?php
include "html/_footer.php";
    ?>
</body>

</html>