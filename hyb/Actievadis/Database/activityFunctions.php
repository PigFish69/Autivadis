<?php
include "../../Class/Activity.php";
require_once "databaseFunctions.php"; 


function getActivitysBetweenTime($current, $next)
{
    $activities = db_getData("SELECT * FROM activity where startTime between '$current' and '$next'");
    if ($activities->num_rows > 0){
        return $activities;
    }
    return "Geen activiteiten gevonden"; 
}

function getAllActivities() 
{
    return db_getData("SELECT * FROM activity");
}
function getAllActivitiesFromNow($current) 
{

    return db_getData("SELECT * FROM activity where startTime >= '$current'");
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
        return "Geen activiteit gevonden";
    }
}

function getAllActivitiesAsClass() 
{
    //should give back an array with all activities as classes  edit: doesn't work
    $activitiesSql = getAllActivities();
    $activityArr = [];
    while ($activity = $activitiesSql->fetch_assoc()) {
        $emtyActivity = new activity();
        $addActivity = $emtyActivity->setActivity(
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
    $foodQ = ($food) ? true : false;
    $priceQ = $price;
    $descriptionQ = $description;
    $imageQ = $image;
    $startTimeQ = $startTime;
    $endTimeQ = $endTime;
    $query->execute();
    $mysqli->close();
}

function updateActivity($activity) 
{
    $mysqli = db_connect();
    $query = $mysqli->prepare("UPDATE `activity` SET `name` = ?, `location` = ?, `food` = ?, 
    `price` = ?, `description` = ?, `startTime` = ?, `endTime` = ? 
    WHERE `activity`.`id` = ?");
    $query->bind_param("ssidsssi", $nameQ, $locationQ, $foodQ, $priceQ, $descriptionQ, $startTimeQ, $endTimeQ, $idQ);
    $nameQ = $activity->getName();
    $locationQ = $activity->getLocation();
    $foodQ = ($activity->getFood()) ? true : false;
    $priceQ = $activity->getPrice();
    $descriptionQ = $activity->getDescription();
    $startTimeQ = $activity->getStartTime();
    $endTimeQ = $activity->getEndTime();
    $idQ = $activity->getId();
    $query->execute();
    $mysqli->close();
}

function deleteActivityById($id)
{
    $query = "DELETE FROM `activity` WHERE `activity`.`Id` = " . $id;
    $queryDelSignups = "DELETE FROM signup WHERE activityId = " . $id;
    
    if (getActivityById($id) == "Geen activiteit gevonden")
    {
        return;
    }

    $activity = new activity(getActivityById($id));
    
    if (file_exists("../../Images/".$activity->getImage()))
    {
        if (db_doQuery($query) && db_doQuery($queryDelSignups))
        {
            unlink("../../Images/".$activity->getImage());
            echo "Activiteit is succesvol verwijdert";
        }
        
    }
}

function registerForActivity($userId, $activityId)
{
    $query = "SELECT * FROM signup WHERE activityId = $activityId && userId = $userId";
    $data = db_getData($query);

    // check if Users is already signed up for activity
    if ($data->num_rows > 0) {
        echo "Je bent al ingeschreven";
    } else {
        $query = "INSERT INTO signup (id, activityId, userId) VALUES ('0', '$activityId', '$userId')";
        db_insertData($query);
        echo "Gelukt gebruiker heeft zich aangemeld voor deze activiteit";
    }
}

function signOutForActivity($userId, $activityId)
{
    $query = "DELETE FROM `signup` WHERE signup.activityId = '$activityId' AND signup.userId = '$userId'";
    db_doQuery($query);
    echo "Gelukt met afmelden";
}

function getAllUsersSignedUp($activityId)
{
    $query = "SELECT userId from signup WHERE activityId = ".$activityId;
    $userids = db_getData($query);
    $userArr = array();

    while ($userId = $userids->fetch_assoc())
    {
        $user = new user(getUserById($userId['userId']));
        array_push($userArr, $user);
    }
    return $userArr;
}
?>