<?php
require_once "databaseFunctions.php"; 

function alreadySignUp($activityId, $userId)
{
    $query = "SELECT * FROM signup WHERE signup.activityId = '$activityId' AND signup.userId = '$userId'";
    print_r($userId);
    $sighUp = db_getData($query);
    $inschrijven = false;
    if ($sighUp->num_rows > 0) {
        $inschrijven = true;
    }
    return $inschrijven;
}

function getActivitiesForUser($userId)
{

    $query = "SELECT signup.activityId FROM signup WHERE userId = '$userId'";
    $allActivities = db_getData($query);

    if ($allActivities->num_rows > 0) {
        return $allActivities;
    } else {
        return "No activity found";
    }

    
}
?>