<?php

require_once ("databaseFunctions.php"); 

function getActivities($current, $next)
{
      
    $user = db_getData("SELECT name, startTime FROM activity where startTime between '$current' and '$next'");

}


?>