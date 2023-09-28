<?php
include ('../../Database/userFunctions.php');
include "../../Class/HandyFunctions.php";
?>
<htlm>
    <link rel="stylesheet" href="../Css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@600&family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Css/header.css">

    <body>
        <div class="Header">
            <div class="Title">
                <img src="../../Images/ImgLogo.png" width="200px">
            </div>
            <nav class="Navheader">
                <ul class="MenuHeader">
                    <li class="headerli"><a href="../General/index.php" class="headerA">Home</a></li>

                    <?php
                if (isset($_COOKIE['CurrUser'])) {
                    $user = new user(getUserById($_COOKIE['CurrUser']));

                    if ($user->getAdmin()) { ?>
                        <li class="headerli"><a href="../Admin/admin.php" class="headerA">Beheer</a></li>
                <?php
                    }
                }
                ?>
                        <li class="headerli">
                        <?php
                        if (isset($_COOKIE['CurrUser'])) {
                        ?> 
                            <a href="../Account/logout.php" class="headerA"><span class="ingelogd">Uitloggen</span>
                        </a>
                        <?php
                        } else { ?>
                            <li class="headerli"><a href="../Account/login.php" class="headerA">Inloggen</a></li>
                        <?php } ?>
                        </li>

                        <?php
                        if (isset($_COOKIE['CurrUser'])) {
                        ?> 
                        <li class="headerli"><a href="../Activities/overview.php" class="headerA">Activiteiten</a></li>
                        <li class="headerli"><a href="#" class="headerA"><?php 
                            $user = new user(getUserById($_COOKIE['CurrUser']));
                            echo $user->getUsername();
                        ?></a></li>
                        <?php
                        }
                        ?>

                </li>
                </ul>
            </nav>
        </div>
    </body>
</htlm>