<?php

require_once ("databaseFunctions.php");

function getUser($username, $password){
    $user = db_getData("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    if ($user->num_rows > 0){
        return $user;
    }
    return "No user found!";
}

function insertUser($username, $password){

    $result = db_insertData("INSERT INTO user (username, password) VALUES ('$username', '$password')");
    return $result;
}

?>