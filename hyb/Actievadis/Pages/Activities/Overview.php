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

<head>
    <link rel="stylesheet" href="../../Css/Overview.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="topContent">
            <div class="colorBackground">
                <h1 class="titleh1">Activiteiten</h1>
            </div>
            <div class="rightSide">
                <div class="rightTopText">
                    <p>Bekijk alle activiteiten voor de komende tijd. Twijfel niet om vragen te stellen. Vergeet ook niet om je aan te melden bij een activiteit waar jij aan mee wilt doen.</p>
                </div>
            </div>
        </div>

        <div class="containerCards">
            <div class="activityCards">
                <?php
                $activity = db_getData("SELECT * FROM `activity`");
                while ($activityData = $activity->fetch_assoc()) {
                ?>


                    <div class="card" id="<?php echo $activityData['id'] ?>">
                        <img src="../../Images/<?php echo $activityData['image'] ?>" />
                        <div class="cardText">
                            <h2><?php echo $activityData['name'] ?></h2>
                            <p>Begin tijd: <?php echo $activityData['startTime'] ?></p>
                            <p>Kosten: <?php echo "€" . number_format((float)$activityData['price'], 2, '.', '') ?></p>
                        </div>
                    </div>


                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
<?php include "../General/footer.php" ?>

</html>
<script src="../../Js/jquery.js"></script>
<script>
    $(document).ready(() => {
        $('#allActivities tbody').on('click', '.btnSignup', function() {
            var id = $(this).attr('id');
            // activity ID is still hard code for testing purposes 
            window.location.href = `overview.php?id=${id}&userId=2`;
        })

        $('.activityCards').on('click', '.card', function() {
            var id = $(this).attr('id');
            window.location.href = `detail.php?id=${id}`
        })
    })
</script>