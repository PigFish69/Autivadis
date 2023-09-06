<?php
    //include header & shite
?>
<link rel="stylesheet" href="../../Css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<body>
    <div class="containerTable">
        <h3 class="bold">Klanten</h3>
        <table id="userTable" class="table table-striped tableKlant">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Locatie</th>
                    <th>Email</th>
                    <th>Volle naam</th>
                    <th>Admin</th>
                    <th>Functies</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = db_getData("SELECT * FROM `users`");
                while ($userData = $users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $userData['Username'] ?></td>
                        <td><?php echo $userData['Password'] ?></td>
                        <td><?php echo $userData['Email'] ?></td>
                        <td><?php echo $userData['Fname'] . " " . $userData['Lname'] ?></td>
                        <td><?php echo $userData['Admin'] ?></td>
                        <td>
                            <button style="background-color: #a3f4a3;" class="btnEdit" id="<?php echo $userData['Id'] ?>"><i class="bi bi-pencil-square"></i></button>
                            <button style="background-color: #f996b5;" class="btnDelete" id="<?php echo $userData['Id'] ?>"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>

                <?php
                }
                ?>
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
    })
</script>