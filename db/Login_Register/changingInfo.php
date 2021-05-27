<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

function PasswordChange(){
   
}

function UsernameChange($newUsername){

    $userId = $_SESSION['userId'];

    $db = new SQLite3("db/labb2db.db");
    $sql = "UPDATE 'User' SET username = :newUsername WHERE userId = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $newUsername, SQLITE3_TEXT);
    $stmt->bindParam(':userId', $userId, SQLITE3_INTEGER);
    $stmt->execute();
    $db->close();
}

function EmailChange(){

}


?>