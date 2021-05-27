<?php
session_start();
include "db.php";

Search(FindId($_POST['username']),  $_POST['password']);

$_SESSION['username'] = $_POST['username'];

//$_SESSION['userId'] = findId($_POST['username']);

?>