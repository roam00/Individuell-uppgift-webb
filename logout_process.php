<?php

session_start();

echo "Logout success";

session_destroy();

header("Location: index.php");

?>