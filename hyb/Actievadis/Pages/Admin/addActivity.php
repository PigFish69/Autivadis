<?php
include "../General/header.php";
include "../../Database/activityFunctions.php";

if (isset($_POST['btnSubmit']))
{
    $img = $_FILES['imgActivity']['name'];
    $target_dir = "../../Images/";
    $target_file = $target_dir . basename($img);
    $imgName = basename($img);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, bestand bestaat al";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imgActivity"]["size"] > 9000000) {
        echo "Sorry, bestand is te groot";
        $uploadOk = 0;
    }
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["imgActivity"]["tmp_name"], $target_file)) {
            // echo "Het bestand ". htmlspecialchars( basename( $_FILES["imgActivity"]["name"])). " is geüpload";
            // addNewBike($_POST['txtName'], $_POST['txtSize'], $_POST['txtBrand'], $_POST['txtDescription'], $imgName, $_POST['txtPrice']);

            addNewActivity($_POST["txtName"], $_POST["txtLocation"], $_POST["chbFood"], 
            $_POST["txtPrice"], $_POST["txtDescription"], $imgName, $_POST["txtStartTime"], $_POST["txtEndTime"]);
            
            header('Location: admin.php');
            exit();
        } else {
            echo "Sorry, er is iets fout gegaan met het uploaden van het bestand";
        }
    }
}
?>
<body>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Naam</td>
                <td><input type="text" name="txtName" required></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><input type="text" name="txtLocation" required></td>
            </tr>
            <tr>
                <td>Incl. voer</td>
                <td><input type="checkbox" name="chbFood"></td>
            </tr>
            <tr>
                <td>Prijs</td>
                <td><input type="number" name="txtPrice" min="0" step=".01" required></td>
            </tr>
            <tr>
                <td class="top">Omschrijving</td>
                <td><textarea name="txtDescription" required></textarea></td>
            </tr>
            <tr>
                <td>Afbeelding</td>
                <td><input type="file" name="imgActivity" accept=".jpg, .jpeg, .png" required></td>
            </tr>
            <tr>
                <td>Start tijd</td>
                <td><input type="datetime-local" name="txtStartTime" required></td>
            </tr>
            <tr>
                <td>Eind tijd</td>
                <td><input type="datetime-local" name="txtEndTime" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSubmit" value="Toevoegen" class="button">
                </td>
            </tr>
        </table>    
        </form>
    </div>
</body>
<?php
include "../General/footer.php";
?>