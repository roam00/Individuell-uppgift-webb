<?php
header('Location: ../../index.php');
$errors = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(0 === preg_match("/\S+/", $_POST['comment'])){
        $errors['comment'] = "Du måste skriva ett inlägg. ";
    }

    if(0 === count($errors)){
        if(!isset($_POST['answerCommentId'])){
            include "dbComments.php";
            AddComment();
        }
        else {
            include "dbComments.php";
            AddReply($_POST['answerCommentId']);
        }
        
    }
    else{
        foreach($errors as $value){
            echo $value . "<br>";
        }
    }
}

?>