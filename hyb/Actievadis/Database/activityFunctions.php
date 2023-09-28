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

function getActivityById($activityId)
{
    $query = "SELECT *
    FROM activity
    WHERE id = '$activityId'";
    $activity = db_getData($query);
    
    if ($activity->num_rows > 0) {
        return $activity;
    } else {
        return "No activity found";
    }
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
            $activity['image'],
            $activity['startTime'],
            $activity['endTime']);
        array_push($activityArr, $addActivity);
    }
    return $activityArr;
}

function addNewActivity($name, $location, $food, $price, $description, $image, $startTime, $endTime) 
{
    $mysqli = db_connect();
    $query = $mysqli->prepare("INSERT INTO `activity` (`name`, `location`, `food`, `price`, `description`, `image`, `startTime`, `endTime`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssidssss", $nameQ, $locationQ, $foodQ, $priceQ, $descriptionQ, $imageQ, $startTimeQ, $endTimeQ);
    $nameQ = $name;
    $locationQ = $location;
    $foodQ = $food;
    $priceQ = $price;
    $descriptionQ = $description;
    $imageQ = $image;
    $startTimeQ = $startTime;
    $endTimeQ = $endTime;

    $query->execute();
    $mysqli->close();
}

function deleteActivityById($id)
{
    $query = "DELETE FROM `activity` WHERE `activity`.`Id` = " . $id;
    
    $activity = new activity(getActivityById($id));
    
    if (file_exists("../../Images/".$activity->getImage()))
    {
        if (db_doQuery($query))
        {
            unlink("../../Images/".$activity->getImage());
        }
        
    }
}

function registerForActivity($userId, $activityId)
{
    $query = "SELECT * FROM signup WHERE activityId = $activityId && userId = $userId";
    $data = db_getData($query);

    // check if Users is already signed up for activity
    if ($data->num_rows > 0) {
        echo "Je Bent Al Ingeschreven";
    } else {
        $query = "INSERT INTO signup (id, activityId, userId) VALUES ('0', '$activityId', '$userId')";
        db_insertData($query);
        echo "Gelukt Gebruiker heeft zich aangemeld voor deze activiteit";
    }
}
?>