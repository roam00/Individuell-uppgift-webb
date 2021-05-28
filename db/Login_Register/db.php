<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


function FindId($username) {
    $db = new SQLite3("../labb2db.db");
    $sql = "SELECT * FROM 'User' WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['userId'];

}

function FindUsername($userId) {
    $db = new SQLite3("../labb2db.db");
    $sql = "SELECT * FROM 'User' WHERE userId = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['username'];

}

function FindEmail($userId) {
    $db = new SQLite3("../labb2db.db");
    $sql = "SELECT * FROM 'User' WHERE userId = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['email'];

}



function Search($userId, $psw) {

    $db = new SQLite3("../labb2db.db");
    $stmt = $db->prepare("SELECT * FROM 'User' WHERE userId = :userId");
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    if(sha1($row['salt'] . $psw) == $row['passwordhash']){
        echo "lyckad";
        header('Location: ../../index.php');
        if(!isset($_SESSION['userId'])){
            session_start();
            $_SESSION['userId'] = $userId;
        }
    }
    else{
        echo "<script>alert('Login failed')</script>";
        header('Location: ../../login.php');
    }
}



function isUserInDB($username){
    $db = new SQLite3("../labb2db.db");
    $stmt = $db->prepare("SELECT * FROM 'User' WHERE username = :username");
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    if($row['username'] == $username){
        return true;
    }
    else{
        return false;
    }
}


function isEmailInDB($email){
    $db = new SQLite3("../labb2db.db");
    $stmt = $db->prepare("SELECT * FROM 'User' WHERE email = :email");
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray();
    if($row['email'] == $email){
        return true;
    }
    else{
        return false;
    }
}


function SaltGeneration(){
    return substr(sha1(mt_rand()), 0, 22);
}


function InsertIntoDatabase($salt){

    $password = $_POST['password'];
    $username = $_POST['username'];
    $email = $_POST['email'];    
    $passwordhash = sha1 ($salt . $password);

    $db = new SQLite3("../labb2db.db");
    $sql = "INSERT INTO 'User' ('username', 'email', 'passwordhash', 'salt') VALUES (:username, :email, :passwordhash, :salt)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT); 
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $stmt->bindParam(':passwordhash', $passwordhash, SQLITE3_TEXT);
    $stmt->bindParam(':salt', $salt, SQLITE3_TEXT);

    if($stmt->execute()){
        $db->close();
        return true;
        $_SESSION['userId'] = FindId($username);
        $_SESSION['email'] = FindEmail($_SESSION['userId']);

    }
    else{
        $db->close();
        return false;
    }
}

function UsernameChange($newUsername){

    if(0 === preg_match("/\S+/", $newUsername)){
        $_SESSION['error'] = "You must enter an username";
    }
    else {
        if(!isUserInDB($newUsername)){
            $userId = $_SESSION['userId'];
            $db = new SQLite3("../labb2db.db");
            $sql = "UPDATE 'User' SET username = :newUsername WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':newUsername', $newUsername, SQLITE3_TEXT);
            $stmt->bindParam(':userId', $userId, SQLITE3_INTEGER);
            $stmt->execute();
            $db->close();
            $_SESSION['username'] = $newUsername;
            unset($_SESSION['error']);
        }
        else {
            $_SESSION['error'] = "Username already taken";
        }
    }

   

    
}

function EmailChange($newEmail){
    
    if(0 === preg_match("/\S+@\S+\.\S+/", $newEmail)){
        $_SESSION['error'] = "You must enter a valid email address";
    }
    else {
        if(!isEmailInDB($newEmail)){
            $userId = $_SESSION['userId'];
            $db = new SQLite3("../labb2db.db");
            $sql = "UPDATE 'User' SET email = :newEmail WHERE userId = :userId";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':newEmail', $newEmail, SQLITE3_TEXT);
            $stmt->bindParam(':userId', $userId, SQLITE3_INTEGER);
            $stmt->execute();
            $db->close();
            $_SESSION['email'] = $newEmail;
            unset($_SESSION['error']);
        }
        else {
            $_SESSION['error'] = "Email already taken";
        }
    }
}


function PasswordChange($newPassword){

    if(0 === preg_match("/\S+/", $newPassword)){
        $_SESSION['error'] = "You must enter a password";
    }
    else {
        $newSalt = SaltGeneration();
        $newPasswordhash = sha1 ($newSalt . $newPassword);

        $userId = $_SESSION['userId'];
        $db = new SQLite3("../labb2db.db");
        $sql = "UPDATE 'User' SET passwordhash = :newPasswordhash, salt = :newSalt WHERE userId = :userId";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':newPasswordhash', $newPasswordhash, SQLITE3_TEXT);
        $stmt->bindParam(':newSalt', $newSalt, SQLITE3_TEXT);
        $stmt->bindParam(':userId', $userId, SQLITE3_INTEGER);
        $stmt->execute();
        $db->close();
    }
}




?>