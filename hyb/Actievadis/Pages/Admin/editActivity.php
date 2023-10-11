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
    
    $emptyActivity = new activity();
    $updatedActivity = $emptyActivity->setActivity($id, $name, $location, $food, $price, $description, $image, $startTime, $endTime);
    updateActivity($updatedActivity);
    header('Location: admin.php');
    exit();
}
?>
<link rel="stylesheet" href="../../Css/editActivity.css">
<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Naam</td>
                <td><input type="text" name="txtName" value="<?php echo $activity->getName()?>" required></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><input type="text" name="txtLocation" value="<?php echo $activity->getLocation()?>" required></td>
            </tr>
            <tr>
                <td>Incl. voer</td>
                <td><input type="checkbox" name="chbFood" <?php if ($activity->getFood()){ echo "checked"; }?>></td>
            </tr>
            <tr>
                <td>Prijs</td>
                <td><input type="number" name="txtPrice" min="0" step=".01" value="<?php echo $activity->getPrice()?>" required></td>
            </tr>
            <tr>
                <td class="top">Omschrijving</td>
                <td><textarea name="txtDescription" required><?php echo $activity->getDescription()?></textarea></td>
            </tr>
            <tr>
                <td>Start tijd</td>
                <td><input type="datetime-local" name="txtStartTime" value="<?php echo $activity->getStartTime()?>" required></td>
            </tr>
            <tr>
                <td>Eind tijd</td>
                <td><input type="datetime-local" name="txtEndTime" value="<?php echo $activity->getEndTime()?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSubmit" value="Aanpassen" class="button">
                </td>
            </tr>
        </table> 
        </form>
        <div>
            <h3>Afbeelding</h3>
            <img src="../../Images/<?php echo $activity->getImage()?>" style="height: 300px;">
        </div>
    </div>
</body>
<?php
include "../General/footer.php";
?>