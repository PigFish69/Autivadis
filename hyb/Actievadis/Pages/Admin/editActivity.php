<?php
include "../General/header.php";
include "../../Database/activityFunctions.php";

if (isset($_GET['id']))
{
    $activity = new activity(getActivityById($_GET['id']));
}
if (isset($_POST['btnSubmit']))
{
    $id = $activity->getId();
    $name = $_POST['txtName'];
    $location = $_POST['txtLocation'];
    $food = (isset($_POST['chbFood'])) ? true : false;
    $price = $_POST['txtPrice'];
    $description = $_POST['txtDescription'];
    $image = $activity->getImage();
    $startTime = $_POST['txtStartTime'];
    $endTime = $_POST['txtEndTime'];

    if (formateDate($startTime) > formateDate($endTime))
    {
        echo "Start tijd is na de eind tijd.";
    } else {
        $emptyActivity = new activity();
        $updatedActivity = $emptyActivity->setActivity($id, $name, $location, $food, $price, $description, $image, $startTime, $endTime);
        updateActivity($updatedActivity);
        header('Location: admin.php');
        exit();
    }
}
?>
<link rel="stylesheet" href="../../Css/editActivity.css">
<link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
<body>
    <div class="container">
        <div class="leftSide">
            <form action="#" method="post" enctype="multipart/form-data">
                <p class="pBlue">Bewerk de activiteit</p>
                <h1>Activiteit bewerken</h1>
            <table>
                <tr>
                    <td>Naam</td>
                </tr>
                <tr>
                    <td><input type="text" name="txtName" value="<?php echo $activity->getName()?>" required></td>
                </tr>
                <tr>
                    <td>Locatie</td>
                </tr>
                <tr>
                    <td><input type="text" name="txtLocation" value="<?php echo $activity->getLocation()?>" required></td>
                </tr>
                <tr>
                    <td>Incl. eten</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="chbFood"  <?php if ($activity->getFood()){ echo "checked"; }?>></td>
                </tr>
                <tr>
                    <td>Prijs</td>
                </tr>
                <tr>
                    <td><input type="number" name="txtPrice" min="0" step=".01" value="<?php echo $activity->getPrice()?>" required></td>
                </tr>
                <tr>
                    <td class="top">Omschrijving</td>
                </tr>
                <tr>
                    <td><textarea name="txtDescription" required><?php echo $activity->getDescription()?></textarea></td>
                </tr>
                <tr>
                    <td>Start tijd</td>
                </tr>
                <tr>
                    <td><input type="datetime-local" name="txtStartTime" value="<?php echo $activity->getStartTime()?>" required></td>
                </tr>
                <tr>
                    <td>Eind tijd</td>
                </tr>
                <tr>
                    <td><input type="datetime-local" name="txtEndTime" value="<?php echo $activity->getEndTime()?>" required></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="btnSubmit" value="Aanpassen" class="buttonTable">
                    </td>
                </tr>
            </table>    
            </form>
            <a href="admin.php"><button class="terugButton">Terug</button></a>
        </div>
        <div class="Rightside">
            <h3>Afbeelding</h3>
            <img src="../../Images/<?php echo $activity->getImage()?>" style="height: 300px;">
        </div>
    </div>
</body>
<?php
include "../General/footer.php";
?>