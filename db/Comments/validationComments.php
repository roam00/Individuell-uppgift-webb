<?php


header('Location: ../index.php');

$errors = array();


if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if(0 === preg_match("/\S+/", $_POST['name1'])){
        $errors['name1'] = "Du måste ange ett namn. ";
    }

    if(0 === preg_match("/\S+@\S+\.\S+/", $_POST['email'])){
        $errors['email'] = "Du måste ange en giltig emailaddress. ";
    }

    if(0 === preg_match("/\S+/", $_POST['comment'])){
        $errors['comment'] = "Du måste skriva ett inlägg. ";
    }

    if(0 === count($errors)){
        include "db.php";
        AddComment();
    }
    else{
        foreach($errors as $value){
            echo $value . "<br>";
        }
    }

}


?>