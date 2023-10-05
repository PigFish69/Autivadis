<?php
    //include header & shite
    require_once "../General/header.php";
    require_once "../../Database/activityFunctions.php";

    if (isset($_GET['id']) && isset($_GET['type']))
    {
        if ($_GET['type'] == 'activity')
        {
            deleteActivityById($_GET['id']);
        }
    }
?>
<link rel="stylesheet" href="../../Css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
<body>
    <div class="containerTable">
        <h1 class="bold">Activiteiten</h1>
        <table id="activityTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Locatie</th>
                    <th>Voedsel</th>
                    <th>Prijs</th>
                    <th>Start tijd</th>
                    <th>Aanmeldingen</th>
                    <th>Functies</th>
                </tr>
            </thead>
            <tbody>
                <?php $activities = getAllActivities();
                while ($activity = $activities->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $activity['name']?></td>
                    <td><?php echo $activity['location']?></td>
                    <td><?php echo boolToYesNo($activity['food'])?></td>
                    <td><?php echo "€" . number_format((float)$activity['price'], 2, '.', '')?></td>
                    <td><?php echo $activity['startTime']?></td>
                    <td><?php echo count(getAllUsersSignedUp($activity['id'])) ?></td>
                    <td>
                        <button class="functionBtn btnMoreInfo" title="Meer info" id="<?php echo $activity['id'] ?>"><i class="bi bi-three-dots"></i></button>
                        <button class="functionBtn btnDelete" title="Meer info" id="<?php echo $activity['id'] ?>"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <button class="btnAddActivity" id="btnAddActivity">Toevoegen</button>
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
                {"data": "name"},
                {"data": "location"},
                {"data": "food"},
                {"data": "price"},
                {"data": "start-time"},
                {"data": "amt_signedUp"},
                {"data": "functions"}
            ]
        });

        //activity
        $('#btnAddActivity').on('click', function() {
            window.location.href = `addActivity.php`;
        })
        $('#activityTable tbody').on('click', '.btnDelete', function() {
            var id = $(this).attr('id');
            window.location.href = `admin.php?id=${id}&type=activity`;
        })
        $('#activityTable tbody').on('click', '.btnMoreInfo', function() {
            var id = $(this).attr('id');
            window.location.href = `adminActivityDetail.php?id=${id}`;
        })
    })
</script>
<?php 
require_once "../General/footer.php";
?>