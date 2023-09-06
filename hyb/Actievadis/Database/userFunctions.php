<?php

require_once ("databaseFunctions.php");

function getUser($username, $password){
    $user = db_getData("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    if ($user->num_rows > 0){
        return $user;
    }
    return "No user found!";
}

?>