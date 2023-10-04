<?php
require_once "header.php";
require_once "../../Database/activityFunctions.php";


$currentDate = date('Y-m-d');
$newDate = date('Y-m-d', strtotime('+1 month'));

$activities = getActivitysBetweenTime($currentDate, $newDate);


?>
<html>

<head>
    <link rel="stylesheet" href="../../Css/index.css">
</head>

<body>


    <div class="container">
        <div class="topContent">
            <div class="leftContent">
                <div class="colorBackground"></div>
                <div class="topText">Goedendag</div>
            </div>
            <div class="rightContent">
                <img class="imageBackground" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxQjcB0XXmxs2wV4fpPxsDbjz4NlAhnmtLPQ&usqp=CAU">
            </div>
        </div>


</body>

</html>

<?php
require_once "footer.php";
?>