<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


function AddComment(){

    

    $userId = $_SESSION['userId'];
    $message = $_POST['comment'];

    date_default_timezone_set("Europe/Stockholm");
    $date = date("Y-m-d H:i:s");


    $db = new SQLite3("../labb2db.db");
    $sql = "INSERT INTO 'Comments' ('userId', 'comment', 'date') VALUES (:userId, :message, :date)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
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

function FindUsernameFromComments($userId) {
    $db = new SQLite3("db/labb2db.db");
    $sql = "SELECT * FROM 'User' WHERE userId = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['username'];

}


/* . $row['username']*/
function Show(){

$db = new SQLite3("db/labb2db.db");
$result = $db->query("SELECT comment, commentID, userId, date FROM 'Comments' ORDER BY commentID");
    
echo "<div class='formDiv' id='commentPageDiv'>";
while ($row = $result->fetchArray())
{
    echo "<div class='commentBox'>

    <div class='commentTop'>
    <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h4 id='idName'> Author: " . FindUsernameFromComments($row['userId']) . "</h4>
    </div>
    <div class='commentMid'> 
    <h2>" . $row['comment'] . "</h2> 
    </div>
    <div class='commentBottom'>
    <h3>" . $row['date'] . "</h3>
    </div>
    
    </div>";
    
}
echo "</div>";
$db->close();

}




/*
echo "<h4>" . $row['comment'] . "</h4>" ;
    echo "Written by: " . $row['name'];
    
    echo "<br><br><br><br>";
    */
?>