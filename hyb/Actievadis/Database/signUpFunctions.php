<?php
require_once "databaseFunctions.php"; 

function alreadySighUp($activityId, $userId)
{
    $query = "SELECT * FROM signup WHERE signup.activityId = '$activityId' AND signup.userId = '$userId'";
    $sighUp = db_getData($query);
    $inschrijven = false;
    if ($sighUp->num_rows > 0) {
        $inschrijven = true;
        return $inschrijven;
    } else {
        return $inschrijven;
    }
}
?>