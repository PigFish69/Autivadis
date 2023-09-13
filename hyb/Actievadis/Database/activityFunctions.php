<?php

require_once ("databaseFunctions.php"); 

function getDateActivities($current, $next)
{
    print_r("SELECT startTime FROM activity where startTime between '$current' and '$next'");    
    return db_getData("SELECT startTime FROM activity where startTime between '$current' and '$next'");

}

function getNameActivities($current, $next)
{
    return db_getData("SELECT name FROM activity where startTime between '$current' and '$next'"); 
}

?>