<?php
require_once "header.php";
require_once "../Database/activityFunctions.php";

$currentDate = date('d-m-Y');
$newDate = date('d-m-Y', strtotime('+1 month'));

$dateActivities = getDateActivities($currentDate, $newDate);
  
echo $dateActivities;
echo $newDate;
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
            
        </div>
    </body>
</html>
<?php
require_once "footer.php";
?>