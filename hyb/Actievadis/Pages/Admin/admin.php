<?php
    //include header & shite
    require_once "../General/header.php";
    require_once "../../Database/activityFunctions.php";
?>
<link rel="stylesheet" href="../../Css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<body>
    <div class="containerTable">
        <h3 class="bold">Activiteiten</h3>
        <table id="activityTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Locatie</th>
                    <th>Voedsel</th>
                    <th>Prijs</th>
                    <th>Start tijd</th>
                    <th>Functies</th>
                </tr>
            </thead>
            <tbody>
                <?php $activities = getAllActivities();
                while ($activity = $activities->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $activity['name']?></td>
                    <td><?php echo $activity['location']?></td>
                    <td><?php echo $activity['food']?></td>
                    <td><?php echo "€" . number_format((float)$activity['price'], 2, '.', '')?></td>
                    <td><?php echo $activity['startTime']?></td>
                    <td>
                        <button class="btnMoreInfo" title="Meer info"><i class="bi bi-three-dots"></i></button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
<script src="../../Js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(() => {
        //gebruikte deze video (destijds)
        //https://youtu.be/BIurvEtcev4

        $('#activityTable').DataTable({
            "columns": [
                {"data": "username"},
                {"data": "password"},
                {"data": "email"},
                {"data": "fullName"},
                {"data": "admin"},
                {"data": "functions"}
            ]
        });
    })
</script>
<?php 
require_once "../General/footer.php";
?>