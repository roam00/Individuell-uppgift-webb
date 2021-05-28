<?php

header("Location: ../../profile.php");

include "db.php";

PasswordChange($_POST['newPassword']);

?>