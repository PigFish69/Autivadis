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
                <a href="../Activities/overview.php"><img src="../../Images/ImgLogo.png" width="200px"></a>
            </div>
            <nav class="Navheader">
                <ul class="MenuHeader">
                    <li class="headerli"><a href="../Activities/overview.php" class="headerA">Activiteiten</a></li>

                    <?php
                if (isset($_COOKIE['CurrUser'])) {
                    $user = new user(getUserById($_COOKIE['CurrUser']));

                    if ($user->getAdmin()) { ?>
                        <li class="headerli"><a href="../Admin/admin.php" class="headerA">Beheer</a></li>
                <?php
                    }
                }
                ?>
                         <li><a href="../Account/login.php">
                        <?php
                        if (isset($_COOKIE['CurrUser'])) {
                        ?> 
                            <a href="../account/profile.php" class="headerA"><?php 
                            $user = new user(getUserById($_COOKIE['CurrUser']));
                            echo $user->getUsername();
                        ?></a>
                        <?php
                        } else { ?>
                            <a href="../Account/login.php" class="headerA">Inloggen</a>
                        <?php } ?>
                    </a>
                    <ul class="dropdown">
                        <li>
                            <?php
                            if (isset($_COOKIE['CurrUser'])) {
                            ?> 
                                <a href="../account/logout.php" class="headerA">uitloggen</a>
                            </a>
                            <?php
                            }?>
                        </li>

                    </ul>
                </li>
                </ul>
            </nav>
        </div>
    </body>
</htlm>