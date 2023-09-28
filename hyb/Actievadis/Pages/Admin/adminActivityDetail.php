<?php
include "../General/header.php";
include "../../Database/activityFunctions.php";

$activity;
if (isset($_GET['id']))
{
    $activity = new activity(getActivityById($_GET['id']));
}

?>
<body>
    <div class="container">
        <img src="../../Images/<?php echo $activity->getImage()?>" class="actImg">
    </div>
</body>
<?php
include "../General/footer.php";
?>