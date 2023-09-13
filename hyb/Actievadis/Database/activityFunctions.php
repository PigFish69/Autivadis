<?php

require_once ("databaseFunctions.php"); 

function getDateActivities($current, $next)
{
    print_r("SELECT startTime FROM activity where startTime between '$current' and '$next'");    
    
    $startTime = db_getData("SELECT startTime FROM activity where startTime between '$current' and '$next'");
    if ($startTime->num_rows > 0){
        return $startTime;
    }
    return "No startTime found!";

}

function getActivitysBetweenTime($current, $next)
{
    $activities = db_getData("SELECT * FROM activity where startTime between '$current' and '$next'");
    if ($activities->num_rows > 0){
        return $activities;
    }
    return "No activities found!"; 
}

?>