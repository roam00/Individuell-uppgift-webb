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

if(isset($_SESSION['username'])){
    echo $_SESSION['username'];

    echo " Login success";

    echo "<form action='logout.php'>";
    echo "<button type='submit'> logout</button>";
    echo "</form>";
}

?>
<?php

if(!isset($_SESSION['username'])){
    echo "<div class='box' id='header'>";
    echo "<h1> Register user </h1>";
    echo "<form action='register.php'>";
    echo "<button type='submit'> Register </button>";
    echo "</form>";
    echo "</div>";

    echo "<div class='box' id='header'>";
    echo "<h1> Log in </h1>";
    echo "<form action='login.php'>";
    echo "<button type='submit'> Log in</button>";
    echo "</form>";
    echo "</div>";

}
?>



<div class="box" id="header">
    <h1> User page </h1>
    <form action="userpage.php">
    <button type="submit"> User page</button>
    </form>
</div>

<div class="box" id="header">
    <h1> User page 2 </h1>
    <form action="userpage2.php">
    <button type="submit"> User page 2</button>
    </form>
</div>

</form>


</body>
</html>