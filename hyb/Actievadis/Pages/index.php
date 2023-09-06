<?php
$currentDate = date('d-m-Y');
$newDate = date('d-m-Y', strtotime('+1 month'));
  
 echo $currentDate;
 echo $newDate;
?>
<html>
    <head>
    <link rel="stylesheet" href="../Css/index.css">
    </head>
    <body>
        <h1>
            Evenementen die eraan komen
        </h1>

        <div>
            <h2></h2>
        </div>
    </body>
</html>