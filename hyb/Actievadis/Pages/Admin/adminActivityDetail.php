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
<body>
    <div class="container">
        <div class="card">
            <img src="../../Images/<?php echo $activity->getImage()?>" class="actImg">
            <div class="cardText">
                <h2><?php echo $activity->getName() ?></h2>
                <table>
                    <tr>
                        <td>Locatie:</td>
                        <td><?php echo $activity->getLocation() ?></td>
                    </tr>
                    <tr>
                        <td>Begin tijd:</td>
                        <td><?php echo $activity->getStartTime() ?></td>
                    </tr>
                    <tr>
                        <td>Eind tijd:</td>
                        <td><?php echo $activity->getEndTime() ?></td>
                    </tr>
                    <tr>
                        <td>Voedsel:</td>
                        <td><?php echo boolToYesNo($activity->getFood()) ?></td>
                    </tr>
                    <tr>
                        <td>Kosten:</td>
                        <td><?php echo "€" . number_format((float)$activity->getPrice(), 2, '.', '') ?></td>
                    </tr>
                    <tr>
                        <td>Omschrijving:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea disabled class="txtDescription"><?php echo $activity->getDescription() ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
<?php
include "../General/footer.php";
?>