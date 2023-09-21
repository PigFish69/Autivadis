<?php
require_once "header.php";
require_once "../../Database/activityFunctions.php";


$currentDate = date('Y-m-d');
$newDate = date('Y-m-d' ,strtotime('+1 month'));

$activities = getActivitysBetweenTime($currentDate, $newDate);


?>
<html>
    <head>
    <link rel="stylesheet" href="../Css/index.css">
    </head>
    <body>
        <h1>
            Evenementen die eraan komen
        </h1>

        <div>
        <?php while ($activity = $activities->fetch_assoc()) { 
        ?><h2><?php 
        $date = "" . $activity['startTime'];   
        echo $activity['name'] . " - " . $date. "";
         ?></h2>
         <br>
<?php } ?>
        </div>
    </body>
</html>

<?php
require_once "footer.php";
?>