<!DOCTYPE html>
<html>

<head>
    <title> Register user </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="js/javaRegister.js"></script>
</head>

<body>


<?php
include "html/_header.php";
?>


<div class="formDiv">

    <?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: index.php");
}
else{
    if(isset($_SESSION['error'])){

        $err = $_SESSION['error'];
        foreach($err as $value){
            echo $value . "<br>";
        }
    }
}

?>

    <div class="box" id="header">
        <h1> Register user </h1>
    </div>

    <div id="error"></div>

    <div class="box">
        <form id="formId" method="post" action="db/Login_Register/validation.php">

            <label for="username">Username: </label><br>
            <input type="text" id="username" name="username"><br>

            <label for="email">Email: </label><br>
            <input type="text" id="email" name="email"><br>

            <label for="password">Password: </label><br>
            <input type="password" id="password" name="password"><br>

            <button type="submit">Submit</button>
    </div>

    </form>


</div>

<?php
include "html/_footer.php";
    ?>

</body>


</html>