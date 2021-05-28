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
    <title> Home </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
include "html/_header.php";
?>

    <div class="formDiv" id="profileDiv">



        <h1> Username: <?php echo $_SESSION['username']; ?> </h1>


        <h1> UserID: <?php echo $_SESSION['userId']; ?> </h1>

        <h1> Email: <?php echo $_SESSION['email']; ?> </h1>


        <h2>Change your username </h2>
        <div id="error"></div>


        <?php
    if(isset($_SESSION['error'])){
        echo $_SESSION['error'] . "<br><br>";
    }
    ?>

        <br>
        <div class="box">
            <form id="formId" method="post" action="db/Login_Register/usernameChange.php">

                <label for="newUsername">New username: </label><br>
                <input type="text" id="newUsername" name="newUsername"><br>

                <button type="submit">Update</button>

            </form>

        </div>

        <h2>Change your email </h2>
        <div id="error"></div>

        <br>
        <div class="box">
            <form id="formId" method="post" action="db/Login_Register/emailChange.php">

                <label for="newEmail">New email: </label><br>
                <input type="text" id="newEmail" name="newEmail"><br>

                <button type="submit">Update</button>

            </form>

        </div>

        <h2>Change your password </h2>
        <div id="error"></div>

        <br>
        <div class="box">
            <form id="formId" method="post" action="db/Login_Register/passwordChange.php">

                <label for="newPassword">New password: </label><br>
                <input type="password" id="newPassword" name="newPassword"><br>

                <button type="submit">Update</button>

            </form>

        </div>

    </div>

    <?php
include "html/_footer.php";
    ?>
</body>

</html>