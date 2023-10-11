<?php
include "../General/header.php";
include "../../Database/activityFunctions.php";

if (isset($_POST['btnSubmit']))
{
    if (formateDate($_POST["txtStartTime"]) > formateDate($_POST["txtEndTime"]))
    {
        echo "Start tijd is na de eind tijd.";
    } else {
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
                addNewActivity($_POST["txtName"], $_POST["txtLocation"], $_POST["chbFood"], 
                $_POST["txtPrice"], $_POST["txtDescription"], $imgName, $_POST["txtStartTime"], $_POST["txtEndTime"]);
                
                header('Location: admin.php');
                exit();
            } else {
                echo "Sorry, er is iets fout gegaan met het uploaden van het bestand";
            }
        }
    }
}
?>
<head>
    <link rel="stylesheet" href="../../Css/addActivity.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>
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
        <a href="admin.php"><button>Terug</button></a>
    </div>
</body>
<?php
include "../General/footer.php";
?>