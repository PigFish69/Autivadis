<?php
    //include header & shite
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
                <tr>
                    <td>Bowlen</td>
                    <td>Eibergen</td>
                    <td>Nee</td>
                    <td>€12.50</td>
                    <td>9/11/2023 20:04</td>
                    <td>
                        <button class="btnMoreInfo" title="Meer info"><i class="bi bi-three-dots"></i></button>
                    </td>
                </tr>
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