<?php
include "../../Database/databaseFunctions.php";
include "../General/header.php";

if (isset($_GET['id']) && isset($_GET['userId'])) {

    $userId = $_GET['userId'];
    $activityId = $_GET['id'];

    registerForActivity($userId, $activityId);
}

// This function is for testing needs to be moved to activitieFunctons when Working

function registerForActivity($userId, $activityId)
{
    $query = "SELECT * FROM signup WHERE activityId = $activityId && userId = $userId";
    $data = db_getData($query);

    // check if Users is already signed up for activity
    if ($data->num_rows > 0) {
        echo "Je Bent Al Ingeschreven";
    } else {
        $query = "INSERT INTO signup (id, activityId, userId) VALUES ('0', '$activityId', '$userId')";
        db_insertData($query);
        echo "Gelukt Gebruiker heeft zich aangemeld voor deze activiteit";
    }
}
?>

<html>
<link rel="stylesheet" href="../../Css/Overview.css">

<!-- Link table relations -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


<body>
    <!-- First give an overview via an Table of all upcoming activities -->


    <div class="containerTable">
        <h3 class="bold">Activiteiten</h3>
        <table id="allActivities" class="table table-striped tableActivities">
            <thead>
                <tr>
                    <th>Naam Activiteit</th>
                    <th>Locatie</th>
                    <th>Eten Inbegrepen</th>
                    <!-- <th>Maximaal Aantal Deelnemers</th> Should-->
                    <!-- <th>Minimaal Aantal Deelnemers</th> Should-->
                    <th>Kosten</th>
                    <!-- <th>Benodigheden</th> Could-->
                    <th>Omschrijving</th>
                    <th>Begin Tijd</th>
                    <th>Eind Tijd</th>
                    <!-- <th>Afbeelding</th> Should-->
                </tr>
            </thead>

            <!-- Get Activity data from Database and fill tables -->
            <!-- Add Button for Sign up / Possibly remove activitie once Signed up for-->

            <tbody>
                <!-- Sample Data -->
                <?php
                $users = db_getData("SELECT * FROM `activity`");
                while ($userData = $users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $userData['name'] ?></td>
                        <td><?php echo $userData['location'] ?></td>
                        <td><?php echo $userData['food'] ?></td>
                        <td><?php echo $userData['price'] ?></td>
                        <td><?php echo $userData['description'] ?></td>
                        <td><?php echo $userData['startTime'] ?></td>
                        <td><?php echo $userData['endTime'] ?></td>
                        <td>
                            <button class="btnSignup" id="<?php echo $userData['id'] ?>"><i class="bi bi-envelope-plus"></i></button>
                        </td>
                        <!-- <td>Laser Gaming</td>
                        <td>Achtertuin Jan</td>
                        <td>Nee</td>
                        <td>€10,55</td>
                        <td>We gaan weer eens laser gamen</td>
                        <td>12.00</td>
                        <td>17.00</td> -->
                    </tr>
                    <!-- <tr>
                        <td>BBQ</td>
                        <td>Achtertuin Peter </td>
                        <td>Ja</td>
                        <td>€29.99</td>
                        <td>We gaan lekker eten</td>
                        <td>16.00</td>
                        <td>20.00</td>

                    </tr> -->
                <?php
                }
                ?>
            </tbody>
    </div>

</body>

<!-- Show all Activities. Which you signed up for -->
<!-- Button for Sign out from activitie -->

</html>
<script src="../../Js/jquery.js"></script>
<script>
    $(document).ready(() => {
        $('#allActivities tbody').on('click', '.btnSignup', function() {
            var id = $(this).attr('id');
            // activity ID is still hard code for testing purposes 
            window.location.href = `Overview.php?id=${id}&userId=2`;
        })
    })
</script>