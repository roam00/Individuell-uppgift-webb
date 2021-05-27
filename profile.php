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

<div class="formDiv">


    <h1> Hi <?php echo $_SESSION['username']; ?> </h1>

    <br>
    <h1> Change username </h1>

    <h1> Change password </h1>

    <h1> Change email </h1>


</div>
    <?php
include "html/_footer.php";
    ?>
</body>

</html>