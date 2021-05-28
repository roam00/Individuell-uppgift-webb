<?php

header("Location: ../../profile.php");

include "db.php";

UsernameChange($_POST['newUsername']);

?>