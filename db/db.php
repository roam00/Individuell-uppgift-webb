<?php

function Search($username, $psw) {
    $db = new SQLite3("labb2db.db");
    $stmt = $db->prepare("SELECT * FROM 'User' WHERE username = :username");
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    //echo "hej";
    //echo gettype($result);
    $row = $result->fetchArray();
    if(sha1($row['salt'] . $psw) == $row['passwordhash']){
        echo "lyckad";
        header('Location: ../index.php');
        if(!isset($_SESSION['username'])){
            session_start();
            $_SESSION['username'] = $_POST['username'];
        }
    }
    else{
        echo "<script>alert('Login failed')</script>";
        header('Location: ../login.php');
    }
}

function isUserInDB($username){
    $db = new SQLite3("labb2db.db");
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
    $db = new SQLite3("labb2db.db");
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


function AddComment($salt){

    $password = $_POST['password'];
    $username = $_POST['username'];
    $email = $_POST['email'];    
    $passwordhash = sha1 ($salt . $password);

    $db = new SQLite3("labb2db.db");
    $sql = "INSERT INTO 'User' ('username', 'email', 'passwordhash', 'salt') VALUES (:username, :email, :passwordhash, :salt)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT); 
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $stmt->bindParam(':passwordhash', $passwordhash, SQLITE3_TEXT);
    $stmt->bindParam(':salt', $salt, SQLITE3_TEXT);

    if($stmt->execute()){
        $db->close();
        return true;
    }
    else{
        $db->close();
        return false;
    }

}


function Show(){

$db = new SQLite3("./db/labb2db.db");
$result = $db->query("SELECT comment, name FROM 'Comments' ORDER BY commentID");
    
while ($row = $result->fetchArray())
{
    echo "<h4>" . $row['comment'] . "</h4>" ;
    echo "Skriven av: " . $row['name'];
    
    echo "<br><br><br><br>";
    
}
$db->close();

}

?>