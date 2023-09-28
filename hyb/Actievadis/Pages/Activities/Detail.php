<?php
require_once "../General/header.php";
require_once "../../Database/activityFunctions.php";

if (isset($_GET['id'])) {
    $activity = new activity(getActivityById($_GET['id']));
}
?>

<html>
<head>
<link rel="stylesheet" href="../../Css/detail.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="infoCard">
            <p class="text p">Wat gaan we precies doen</p>
            <h1 class="text h1"><?php echo $activity->getName(); ?></h1>
            <p class="text omschrijving"><?php echo $activity->getDescription(); ?></p>
            <h1 class="text inschrijven">inschrijven?</h1>
        </div> 
        <div class="menuCard">
            <menu class="menuDetail">
                <h2 class="h2">Detials</h2>
                <li class="detailli location"><?php echo $activity->getLocation(); ?></li>
                <li class="detailli date"><?php echo $activity->getDate(); ?></li>
                <li class="detailli price"><?php echo "€" . number_format((float)$activity->getPrice(), 2, '.', '')?></li>
                <li class="detailli food"><?php echo boolToYesNo($activity->getFood());?></li>
            </menu>
        </div>  
    </div>
</body>

</html>

