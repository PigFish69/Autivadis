<?php
require_once "../General/header.php";
require_once "../../Class/HandyFunctions.php";
require_once "../../Database/signUpFunctions.php";
require_once "../../Database/activityFunctions.php";
require_once "../../Class/Activity.php";

if (isset($_COOKIE['CurrUser'])) {
    $user = new user(getUserById($_COOKIE['CurrUser']));

    

    if (isset($_POST['bevestig'])) {
        $currentlyP = $_POST['currently'];
        $newP = $_POST['new'];
        
        if($currentlyP == $user->getPassword())
        {
            updatePassword($newP, $user->getId());
            echo '<script>alert("Wachtwoord vernieuwd")</script>';
        }else{
            echo '<script>alert("Wachtwoord fout")</script>';
        }
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
                <h3>Email:</h3>
                <li>voorbeeld@nu.nl</li>
                <h3>Huidig wachtwoord:</h3>
                <form action="" method="post">
                <input type="password" id="currently" name="currently"><br>
                <h3>Nieuw wachtwoord:</h3>
                <input type="password" id="new" name="new"><br>
                <input type="submit" name="bevestig" class="btn">
                </form>
            </ul>
    
            <h2 class="h2Overview"><bold><?php ?></bold> opgegeven activiteiten</h2>
        </div>
    
        <div class="containerOverview">
            <div class="activiteitenOverview" id="<?php echo $activityData['id'] ?>">
            <?php
                if($getActivityID = getActivitiesForUser($user->getId()))
                {
                    $activities = [];
                    while($activity = $getActivityID->fetch_assoc())
                    {
                        array_push($activities, new Activity(getActivityById($activity['activityId'])));
                    }
                    foreach($activities as $activitiesData)
                    {
                    ?>
                <div class="Leftactivity">
               
                    <img src="../../Images/<?php echo $activitiesData->getImage(); ?>">
                </div>
                <div class="Rightactivity">
                    

                    <h2><?php echo $activitiesData->getname(); ?></h2>
                    <p><?php echo $activitiesData->getlocation(); ?></p>
                    <p>Kosten: <?php echo "€" . number_format((float)$activitiesData->getprice(), 2, '.', '') ?></p>
                   
                </div>
                <?php
                    }
                }
            }
                    ?>
            </div>
        </div>
    </div>
</body>

</html>


<?php
require_once "../General/footer.php";
?>