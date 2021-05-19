<?php

header('Location: index.php');



include "db.php";
AddComment();

/*
echo "123";
$user = $_POST['name1'];
$message = $_POST['comment'];
$email = $_POST['email'];
$db = new SQLite3("./db/sqlite.db");
$sql = "INSERT INTO 'Comments' ('name', 'comment', email) VALUES (:user, :message, :email)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user', $user, SQLITE3_TEXT); 
$stmt->bindParam(':message', $message, SQLITE3_TEXT);
$stmt->bindParam(':email', $email, SQLITE3_TEXT);
echo "hej från dbHelp.php";
if($stmt->execute()){
    $db->close();
    return true;
}
else{
    $db->close();
    return false;
}
*/


/*
    $db = new SQLite3("./db/sqlite.db");
    $result = $db->query("SELECT name, id FROM 'User' ORDER BY id");
    while ($row = $result->fetchArray())
    {
        echo "<h1>" . $row['name'] . "</h1>";
        echo '<br>';
    }
    $db->close();
    */
/*
    function AddComment($user, $message, $email) {
        $db = new SQLite3("./db/sqlite.db");
        $sql = "INSERT INTO 'Comments' ('name', 'comment', email) VALUES (:user, :message, :email)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user', $user, SQLITE3_TEXT); 
        $stmt->bindParam(':message', $message, SQLITE3_TEXT);
        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        echo "hej från dbHelp.php";
        if($stmt->execute()){
            $db->close();
            return true;
        }
        else{
            $db->close();
            return false;
        }
    }
    
    function Search($term){
    $db = new SQLite3("./db/sqlite.db");
    $stmt = $db->prepare("SELECT * FROM 'Post' WHERE Message LIKE :search ORDER BY id");
    $stmt->bindValue(':search', "%".$term."%", SQLITE3_TEXT);
    $result = $stmt->execute();
    return $result; 
}
*/
?>