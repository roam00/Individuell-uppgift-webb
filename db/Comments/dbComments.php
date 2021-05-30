<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(!(isset($_SESSION['username']))){
    
    header('Location: login.php');
    
    die();
    echo "You have to log in to access that page";
}


// Lägger till en kommentar till Comments tablet 
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


// Plockar ut användarnamn där userId är input
function FindUsernameFromComments($userId) {
    $db = new SQLite3("../labb2db.db");
    $sql = "SELECT * FROM 'User' WHERE userId = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['username'];

}


// Samma som AddComment förutom att den lägger till en answerCommentID också
function AddReply($replyId){

    $userId = $_SESSION['userId'];
    $message = $_POST['comment'];

    date_default_timezone_set("Europe/Stockholm");
    $date = date("Y-m-d H:i:s");


    $db = new SQLite3("../labb2db.db");
    $sql = "INSERT INTO 'Comments' ('userId', 'comment', 'date', 'answerCommentID') VALUES (:userId, :message, :date, :answerCommentID)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId, SQLITE3_TEXT);
    $stmt->bindParam(':message', $message, SQLITE3_TEXT);
    $stmt->bindParam(':date', $date, SQLITE3_TEXT);
    $stmt->bindParam(':answerCommentID', $replyId, SQLITE3_INTEGER);

    if($stmt->execute()){
        $db->close();
        return true;
    }
    else{
        $db->close();
        return false;
    }

}


// Plockar ut kommentar som matchar med commentId
function FindCommentById($commentId) {
    $db = new SQLite3("../labb2db.db");
    $sql = "SELECT * FROM 'Comments' WHERE commentID = :commentID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':commentID', $commentId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['comment'];

}


// Plockar ut användarnamnet som matchar med commentId
function FindAuthorByCommentId($commentId) {
    $db = new SQLite3("../labb2db.db");
    $sql = "SELECT * FROM 'Comments' WHERE commentID = :commentID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':commentID', $commentId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return FindUsernameFromComments($row['userId']);

}


// Plockar ut userId från commentId
function FindUserIdByCommentId($commentId) {
    $db = new SQLite3("db/labb2db.db");
    $sql = "SELECT * FROM 'Comments' WHERE commentID = :commentID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':commentID', $commentId, SQLITE3_TEXT);
    $result = $stmt->execute();

    $row = $result->fetchArray();

    return $row['userId'];

}


// Displayar alla kommentarer samt de kommentarer som är svar på andra kommentarer
function Show(){

$db = new SQLite3("../labb2db.db");
$result = $db->query("SELECT comment, commentID, userId, date, answerCommentID FROM 'Comments' ORDER BY commentID");
    
echo "<div class='formDiv' id='commentPageDiv'>";
while ($row = $result->fetchArray())
{

    if(isset($row['answerCommentID'])){
        echo "<div class='commentBox'>

        <div class='commentTop'>
        <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h4 id='idName'> Author: " . FindUsernameFromComments($row['userId']) . "</h4>
        </div>
        <div class='commentMid'> 

        <div class='answerDiv'>
        <div class='commentTop'>
        <h5 id='idNum'> #" . $row['answerCommentID'] . "</h5> <h5 id='idName'> Author: " . FindAuthorByCommentId($row['answerCommentID']) . "</h5>
        </div>
        <h4>"; 
        echo FindCommentById($row['answerCommentID']);
        echo "</h4>
        </div>

        <h4>" . $row['comment'] . "</h4> 
        </div>
        <div class='commentBottom'>
        <h3>" . $row['date'] . "<form action='answerComment.php' method='post'>" ."<button name='reply' type='submit' value=" . $row['commentID'] . ">Reply</button> " ."</form>" . "</h3>
        </div>
        
        </div>";


    }
    else {
        echo "<div class='commentBox'>

        <div class='commentTop'>
        <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h4 id='idName'> Author: " . FindUsernameFromComments($row['userId']) . "</h4>
        </div>
        <div class='commentMid'>


        <h4>" . $row['comment'] . "</h4> 
        </div>
        <div class='commentBottom'>
        <h3>" . $row['date'] . "<form action='answerComment.php' method='post'>" ."<button name='reply' type='submit' value=" . $row['commentID'] . ">Reply</button> " ."</form>" . "</h3>
        </div>
        
        </div>";
    }

    
}
echo "</div>";
$db->close();

}
    



/*
function SearchForComment($commentTerm) {

    $newCommentTerm = '%' . $commentTerm . '%';
    $db = new SQLite3("../labb2db.db");
    $stmt = $db->prepare("SELECT * FROM 'Comments' WHERE comment LIKE :newCommentTerm ORDER BY commentId");
    $stmt->bindParam(':newCommentTerm', $newCommentTerm, SQLITE3_TEXT);
    $result = $stmt->execute();
    
    echo "<div class='formDiv' id='commentPageDiv'>";
    while ($row = $result->fetchArray()) {
        echo "<div class='commentBox'>

        <div class='commentTop'>
        <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h4 id='idName'> Author: " . FindUsernameFromComments($row['userId'])  .  "</h4>
        </div>
        <div class='commentMid'> 
        <h3>" . $row['comment'] . "</h3> 
        </div>
        <div class='commentBottom'>
        <h3>" . $row['date'] . "</h3>
        </div>
        
        </div>";
    }
    echo "</div>";
    
$db->close();
}
*/


// Sökfunktionalitet som hittar alla kommentarer som innehåller en viss substring
function SearchForComment($commentTerm) {

    $newCommentTerm = '%' . $commentTerm . '%';
    $db = new SQLite3("../labb2db.db");
    $stmt = $db->prepare("SELECT * FROM 'Comments' WHERE comment LIKE :newCommentTerm ORDER BY commentId");
    $stmt->bindParam(':newCommentTerm', $newCommentTerm, SQLITE3_TEXT);
    $result = $stmt->execute();
    
    echo "<div class='formDiv' id='commentPageDiv'>";
while ($row = $result->fetchArray())
{

    if(isset($row['answerCommentID'])){
        echo "<div class='commentBox'>

        <div class='commentTop'>
        <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h4 id='idName'> Author: " . FindUsernameFromComments($row['userId']) . "</h4>
        </div>
        <div class='commentMid'> 

        <div class='answerDiv'>
        <div class='commentTop'>
        <h3 id='idNum'> #" . $row['answerCommentID'] . "</h3> <h4 id='idName'> Author: " . FindAuthorByCommentId($row['answerCommentID']) . "</h4>
        </div>
        <h3>"; 
        echo FindCommentById($row['answerCommentID']);
        echo "</h3>
        </div>

        <h4>" . $row['comment'] . "</h4> 
        </div>
        <div class='commentBottom'>
        <h3>" . $row['date'] . "<form action='answerComment.php' method='post'>" ."<button name='reply' type='submit' value=" . $row['commentID'] . ">Reply</button> " ."</form>" . "</h3>
        </div>
        
        </div>";


    }
    else {
        echo "<div class='commentBox'>

        <div class='commentTop'>
        <h3 id='idNum'> #" . $row['commentID'] . "</h3> <h4 id='idName'> Author: " . FindUsernameFromComments($row['userId']) . "</h4>
        </div>
        <div class='commentMid'>


        <h4>" . $row['comment'] . "</h4> 
        </div>
        <div class='commentBottom'>
        <h3>" . $row['date'] . "<form action='answerComment.php' method='post'>" ."<button name='reply' type='submit' value=" . $row['commentID'] . ">Reply</button> " ."</form>" . "</h3>
        </div>
        
        </div>";
    }

    
}
echo "</div>";
$db->close();
}

?>