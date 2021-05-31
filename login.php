<!DOCTYPE html>
<html>

<head>
    <title> Log in </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="js/javaLogin.js"></script>
</head>

<body>


    <?php
include "html/_header.php";
?>

    <div class="formDiv">

        <div class="box" id="header">
            <h1> Log in </h1>
        </div>

        <?php
        session_start();
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'] . "<br><br>";
        unset($_SESSION['error']);
        }
    
    ?>


        <div id="error"></div>

        <div class="box">
            <form id="formId" method="post" action="./db/Login_Register/verification.php">

                <label for="username">Username: </label><br>
                <input type="text" id="username" name="username"><br>

                <label for="password">Password: </label><br>
                <input type="password" id="password" name="password"><br>

                <button type="submit">Submit</button>
        </div>
        </form>

        <div class="box">
            <h3> New here?
                <a href="register.php">Register an account</a>
            </h3>
        </div>

    </div>

  

</body>


</html>