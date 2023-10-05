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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
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
        <div>
            <?php $usersSignedUp = getAllUsersSignedUp($activity->getId());?>
            <h2>Totale aangemeld: <?php echo count($usersSignedUp)?></h2>
            <table id="signUpTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Naam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($usersSignedUp); $i++) { ?>
                        <tr>
                            <td><?php echo $i+1 ?></td>
                            <td><?php echo $usersSignedUp[$i]->getUsername() ?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="../../Js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
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