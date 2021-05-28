<?php

header("Location: ../../profile.php");

include "db.php";

EmailChange($_POST['newEmail']);

?>