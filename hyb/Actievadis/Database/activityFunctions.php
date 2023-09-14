<?php
include "../../Class/Activity.php";
require_once "databaseFunctions.php"; 

function getDateActivities($current, $next)
{
    print_r("SELECT startTime FROM activity where startTime between '$current' and '$next'");    
    return db_getData("SELECT startTime FROM activity where startTime between '$current' and '$next'");
}

function getNameActivities($current, $next)
{
    return db_getData("SELECT name FROM activity where startTime between '$current' and '$next'"); 
}

function getAllActivities() {
    return db_getData("SELECT * FROM activity");
}

function getAllActivitiesAsClass() {
    //should give back an array with all activities as classes
    $activitiesSql = db_getData("SELECT * FROM activity");
    $activityArr = [];
    while ($activity = $activitiesSql->fetch_assoc()) {
        $addActivity = new activity();
        $addActivity = $addActivity->setActivity(
            $activity['id'], 
            $activity['name'],
            $activity['location'],
            $activity['food'],
            $activity['price'],
            $activity['description'],
            $activity['startTime'],
            $activity['endTime']);
        array_push($activityArr, $addActivity);
    }
    return $activityArr;
}
?>