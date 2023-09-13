<?php ?>

<html>
<link rel="stylesheet" href="../../Css/Overview.css">

<!-- Link table relations -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" rel="stylesheet">

<body>
    <!-- First give an overview via an Table of all upcoming activities -->


    <div class="containerTable">
        <h3 class="bold">Activiteiten</h3>
        <table id="allActivities" class="table table-striped tableActivities">
            <thead>
                <tr>
                    <th>Naam Activiteit</th>
                    <th>Locatie</th>
                    <th>Eten Inbegrepen</th>
                    <!-- <th>Maximaal Aantal Deelnemers</th> Should-->
                    <!-- <th>Minimaal Aantal Deelnemers</th> Should-->
                    <th>Kosten</th>
                    <!-- <th>Benodigheden</th> Could-->
                    <th>Omschrijving</th>
                    <th>Begin Tijd</th>
                    <th>Eind Tijd</th>
                    <!-- <th>Afbeelding</th> Should-->
                </tr>
            </thead>

            <!-- Get Activity data from Database and fill tables -->
            <!-- Add Button for Sign up / Possibly remove activitie once Signed up for-->

            <tbody>
                <!-- Sample Data -->

                <tr>
                    <td>Laser Gaming</td>
                    <td>Achtertuin Jan</td>
                    <td>Nee</td>
                    <td>€10,55</td>
                    <td>We gaan weer eens laser gamen</td>
                    <td>12.00</td>
                    <td>17.00</td>
                </tr>
                <tr>
                    <td>BBQ</td>
                    <td>Achtertuin Peter </td>
                    <td>Ja</td>
                    <td>€29.99</td>
                    <td>We gaan lekker eten</td>
                    <td>16.00</td>
                    <td>20.00</td>

                </tr>
            </tbody>
    </div>

</body>

<!-- Show all Activities. Which you signed up for -->
<!-- Button for Sign out from activitie -->

</html>