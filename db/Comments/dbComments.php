<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


function AddComment(){
   
    $user = $_SESSION['username'];
    $message = $_POST['comment'];

    $db = new SQLite3("../labb2db.db");
    $sql = "INSERT INTO 'Comments' ('name', 'comment') VALUES (:user, :message)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $user, SQLITE3_TEXT); 
    $stmt->bindParam(':message', $message, SQLITE3_TEXT);
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);

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

$db = new SQLite3("db/labb2db.db");
$result = $db->query("SELECT comment, name FROM 'Comments' ORDER BY commentID");
    
while ($row = $result->fetchArray())
{
    echo "<h4>" . $row['comment'] . "</h4>" ;
    echo "Skriven av: " . $row['name'];
    
    echo "<br><br><br><br>";
    
}
$db->close();

}