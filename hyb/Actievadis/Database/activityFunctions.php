<?php
include "../../Class/Activity.php";
require_once "databaseFunctions.php"; 


function getActivitysBetweenTime($current, $next)
{
    $activities = db_getData("SELECT * FROM activity where startTime between '$current' and '$next'");
    if ($activities->num_rows > 0){
        return $activities;
    }
    return "No activities found!"; 
}

function getAllActivities() 
{
    return db_getData("SELECT * FROM activity");
}

function getAllActivitiesAsClass() 
{
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