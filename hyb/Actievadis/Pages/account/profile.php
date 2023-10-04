<?php
require_once "../General/header.php";
require_once "../../Class/HandyFunctions.php";
require_once "../../Database/signUpFunctions.php";
require_once "../../Database/activityFunctions.php";

if (isset($_COOKIE['CurrUser'])) {
    $user = new user(getUserById($_COOKIE['CurrUser']));
    $getActivityID = getActivitiesForUser($user->getId());
    // $actiactivityData = (getActivityById($getActivityID));
}
?>
<html>
<head>
    <link rel="stylesheet" href="../../Css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>
<body>   
    <div class="container">      
        <div class="colorBackground">
            <h1>Profielpagina</h1>
            <p>Bekijk hieronder je opgegeven gegevens</p>
    
            <ul class="menuGebruikergegevens">
                <h3>Gebruikernaam:</h3>
                <li><?php echo $user->getUsername();?></li>
                <h3>Beheerder:</h3>
                <li><?php echo boolToYesNo($user->getAdmin());?></li>
            </ul>
    
            <h2 class="h2Overview"><bold><?php ?></bold> opgegeven activiteiten</h2>
        </div>
    
        <div class="containerOverview">
            <div class="activiteitenOverview" id="<?php echo $activityData['id'] ?>">
                <div class="Leftactivity">
                    <img src="https://maken.wikiwijs.nl/generated/s960x720_3eb68a0fc0f8354d440713a2ed902b657cac8ef2.jpg">
                </div>
                <div class="Rightactivity">
                    <h2><?php $actiactivityData['name'] ?></h2>
                    <p><?php echo $actiactivityData['location']?></p>
                    <p>date</p>
                    <p>Kosten: <?php echo "€" . number_format((float)$actiactivityData['price'], 2, '.', '') ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php
require_once "../General/footer.php";
?>