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
        <div class="leftSide">
            <form action="#" method="post" enctype="multipart/form-data">
                <p class="pBlue">Voeg nog een activiteit toe</p>
                <h1>Activiteiten toevoegen</h1>
            <table>
                <tr>
                    <td>Naam</td>
                </tr>
                <tr>
                    <td><input type="text" name="txtName" required></td>
                </tr>
                <tr>
                    <td>Locatie</td>
                </tr>
                <tr>
                    <td><input type="text" name="txtLocation" required></td>
                </tr>
                <tr>
                    <td>Incl. eten</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="chbFood"></td>
                </tr>
                <tr>
                    <td>Prijs</td>
                </tr>
                <tr>
                    <td><input type="number" name="txtPrice" min="0" step=".01" required></td>
                </tr>
                <tr>
                    <td class="top">Omschrijving</td>
                </tr>
                <tr>
                    <td><textarea name="txtDescription" required></textarea></td>
                </tr>
                <tr>
                    <td>Afbeelding</td>
                </tr>
                <tr>
                    <td><input type="file" name="imgActivity" accept=".jpg, .jpeg, .png" required></td>
                </tr>
                <tr>
                    <td>Start tijd</td>
                </tr>
                <tr>
                    <td><input type="datetime-local" name="txtStartTime" required></td>
                </tr>
                <tr>
                    <td>Eind tijd</td>
                </tr>
                <tr>
                    <td><input type="datetime-local" name="txtEndTime" required></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="btnSubmit" value="Toevoegen" class="buttonTable">
                    </td>
                </tr>
            </table>    
            </form>
            <a href="admin.php"><button class="terugButton">Terug</button></a>
        </div>
        <div class="Rightside">
            <p class="pColor">Geen idee wat te doen?</p>
            <h2>Hier een paar ideeën</h2>
            <ul class="listActivityIdeas">
                <li>Darten</li>
                <li>Karten</li>
                <li>Skeeleren</li>
                <li>Bowlen</li>
                <li>Golfen</li>
                <li>Uit eten</li>
                <li>Feestje</li>
                <li>Buitenland bezoeken</li>
                <li>Weekend weg</li>
                <li>Workshop volgen</li>
            </ul>
        </div>
    </div>
</body>
<?php
include "../General/footer.php";
?>