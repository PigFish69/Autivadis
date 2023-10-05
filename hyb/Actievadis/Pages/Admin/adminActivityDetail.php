<?php
include "../General/header.php";
include "../../Database/activityFunctions.php";

$activity;
if (isset($_GET['id']))
{
    $activity = new activity(getActivityById($_GET['id']));
}

?>
<link rel="stylesheet" href="../../Css/adminActivityDetail.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">

<body>
    <div class="container">
        <div class="leftSide">
            <p class="orange">Activiteit gedetaileerd</p>
            <div class="menuActivity">
            <h1><?php echo $activity->getName() ?></h1>
            <h3>Locatie</h3>
            <p><?php echo $activity->getLocation() ?></p>

            <h3>Begin tijd</h3>
            <p><?php echo $activity->getStartTime() ?></p>

            <h3>Eind tijd</h3>
            <p><?php echo $activity->getEndTime() ?></p>

            <h3>Eten inbegrepen?</h3>
            <p><?php echo boolToYesNo($activity->getFood()) ?></p>

            <h3>Kosten</h3>
            <p>€ <?php echo number_format((float)$activity->getPrice(), 2, '.', '')?></p>

            <h3>Omgeving</h3>
            <textarea disabled class="txtDescription"><?php echo $activity->getDescription() ?></textarea>

            </div>
        </div>
        <div class="rightSide">
            <img src="../../Images/<?php echo $activity->getImage()?>" class="actImg">    
        </div>
        <div class="card">
            <div class="cardText">
            </div>
        </div>
    </div>
</body>
<?php
include "../General/footer.php";
?>