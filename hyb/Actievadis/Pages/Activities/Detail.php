<?php
require_once "../General/header.php";
require_once "../../Database/activityFunctions.php";
require_once "../../Database/signUpFunctions.php";

if (isset($_GET['id'])) {
    $activity = new activity(getActivityById($_GET['id']));

    if (isset($_POST['register'])) {
        registerForActivity($_GET['id'], $_COOKIE['CurrUser']);
    }
    if (isset($_POST['signOut'])) {
        signOutForActivity($_GET['id'], $_COOKIE['CurrUser']);
    }
    
?>

<html>
<head>
<link rel="stylesheet" href="../../Css/detail.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="infoCard">
            <p class="text p">Wat gaan we precies doen</p>
            <h1 class="text h1"><?php echo $activity->getName(); ?></h1>
            <p class="text omschrijving"><?php echo $activity->getDescription(); ?></p>
            <form method="post" action="">
                <?php 
                    if(!alreadySignUp($_GET['id'], $_COOKIE['CurrUser']))
                    {
                ?>
                <button type="submit" name="register" class="btn">Inschrijven?</button>
                <?php
                    }
                    if(alreadySignUp($_GET['id'], $_COOKIE['CurrUser']))
                    {
                ?>
                <button type="submit" name="signOut" class="btn">Uitschrijven?</button>
                <?php
                    }
                }
                ?>
            </form>    
        </div> 
        <div class="menuCard">
            <menu class="menuDetail">
                <h2 class="h2">Details</h2>
                <li class="detailli location"><?php echo $activity->getLocation(); ?></li>
                <li class="detailli date"><?php echo $activity->getDate(); ?></li>
                <li class="detailli price">€<?php echo $activity->getPrice(); ?></li>
                <li class="detailli food"><?php 
                if($activity->getFood() == 0)
                { 
                    echo "Nee";
                }
                else{
                    echo "Ja";
                }
                ?></li>
            </menu>
        </div>  
    </div>
</body>

</html>

