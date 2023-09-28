<?php
include "../../Database/activityFunctions.php";
include "../General/header.php";

if (isset($_GET['id']) && isset($_GET['userId'])) {

    $userId = $_GET['userId'];
    $activityId = $_GET['id'];

    registerForActivity($userId, $activityId);
}
?>

<html>
<link rel="stylesheet" href="../../Css/Overview.css">



<body>

    <div class="containerCards">
        <h1 class="bold">Activiteiten</h3>
            <div class="activityCards">
                <?php
                $activities = getAllActivities();
                while ($activityData = $activities->fetch_assoc()) {
                ?>
                    <div class="card" id="<?php echo $activityData['id'] ?>">
                        <img src="https://maken.wikiwijs.nl/generated/s960x720_3eb68a0fc0f8354d440713a2ed902b657cac8ef2.jpg" />
                        <div class="cardText">
                            <h3><?php echo $activityData['name'] ?></h3>
                            <p>Begin tijd: <?php echo $activityData['startTime'] ?></p>
                            <p>Kosten: <?php echo "€" . number_format((float)$activityData['price'], 2, '.', '') ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <!-- ------TABLE HAS BEEN REJECTED ^Going to be cards^ -->
            <!--<table id="allActivities" class="table table-striped tableActivities">
            <thead>
                <tr>
                    <th>Naam Activiteit</th>
                    <th>Locatie</th>
                    <th>Eten Inbegrepen</th>
                    <th>Maximaal Aantal Deelnemers</th> Should
                    <th>Minimaal Aantal Deelnemers</th> Should
                    <th>Kosten</th>
                    <th>Benodigheden</th> Could
                    <th>Omschrijving</th>
                    <th>Begin Tijd</th>
                    <th>Eind Tijd</th>
                    <th>Afbeelding</th> Should
                </tr>
            </thead>

            Get Activity data from Database and fill tables
            Add Button for Sign up / Possibly remove activitie once Signed up for

            <tbody>
                Sample Data
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

                    </tr>
                <?php
                }
                ?>
            </tbody> -->
    </div>

</body>
<!-- <?php include "../General/footer.php" ?> -->

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