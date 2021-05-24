<!DOCTYPE html>
<html>
<head>

    <title>Show comments</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="comments.php">Show comments</a></li>
    <li><a href="writeComment.php">Write a comment</a></li>
    <?php
    if(!isset($_SESSION['username'])){
        echo "<li style='float: right;'><a href='register.php'>Sign up</a></li>
        <li style='float: right;'><a href='login.php'>Log in</a></li>";
    }
    ?>
</ul>

<br><br>

    <div class="box" id="boxComment">
    <h1>Välkommen till kommentarssidan <br>
    Här kan man se alla kommentarer </h1>
</div>

    <?php
    include "db/Comments/dbShowComments.php";
    ?>

</body>
</html>