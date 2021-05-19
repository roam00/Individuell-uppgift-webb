<!DOCTYPE html>
<html>
<head>

    <title>Show comments</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<div class="box">
    <a href="index.php">Go back</a>
</div>
<br><br>

    <div class="box" id="boxComment">
    <h1>Välkommen till kommentarssidan <br>
    Här kan man se alla kommentarer </h1>
</div>

    <?php
    include "./db/dbShowComment.php";
    ?>

</body>
</html>