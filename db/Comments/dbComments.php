<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


function AddComment(){
   
    $user = $_SESSION['username'];
    $message = $_POST['comment'];

    date_default_timezone_set("Europe/Stockholm");
    $date = date("Y-m-d h:i:s");


    $db = new SQLite3("../labb2db.db");
    $sql = "INSERT INTO 'Comments' ('name', 'comment', 'date') VALUES (:user, :message, :date)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $user, SQLITE3_TEXT); 
    $stmt->bindParam(':message', $message, SQLITE3_TEXT);
    $stmt->bindParam(':date', $date, SQLITE3_TEXT);

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
$result = $db->query("SELECT comment, name, commentID, date FROM 'Comments' ORDER BY commentID");
    
while ($row = $result->fetchArray())
{
    echo "<div class='commentBox'>

    <div class='commentTop'>
    <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h3 id='idName'>" . $row['name'] . "</h3>
    </div>
    <div class='commentMid'> 
    <h2>" . $row['comment'] . "</h2> 
    </div>
    <div class='commentBottom'>
    <h3>" . $row['date'] . "</h3>
    </div>
    
    </div>";
    
}
$db->close();

}




/*
echo "<h4>" . $row['comment'] . "</h4>" ;
    echo "Written by: " . $row['name'];
    
    echo "<br><br><br><br>";
    */
?>