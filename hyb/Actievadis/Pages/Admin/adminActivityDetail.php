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
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet"> -->
<body>
    <div class="container">
        <div class="topInfo">
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
    
                <?php $usersSignedUp = getAllUsersSignedUp($activity->getId());?>
                <h2>Totaal aangemeld: <?php echo count($usersSignedUp)?></h2>
                </div>
                <a href="admin.php"><button class="terugButton">Terug</button></a>
            </div>
            <div class="rightSide">
                <img src="../../Images/<?php echo $activity->getImage()?>" class="actImg">    
            </div>
        </div>
        <div class="whiteTable">
            <div class="bottomTable">
                <h3 class="textH3">Alle opgegeven gebruikers</h3>
                <div class="table">
                    <?php for ($i=0; $i < count($usersSignedUp); $i++) { ?>
                        <p><?php echo $usersSignedUp[$i]->getUsername() ?></p>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script src="../../Js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->
<script>
    $(document).ready(() => {
        //gebruikte deze video (destijds)
        //https://youtu.be/BIurvEtcev4

        $('#signUpTable').DataTable({
            "columns": [
                {"data": "number"},
                {"data": "name"}
            ]
        });
    })
</script>
<?php
include "../General/footer.php";
?>