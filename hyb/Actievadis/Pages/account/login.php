<?php
require_once "../General/header.php";
require_once "../../Database/userFunctions.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = getUser($username, $password);

    if($user == "No user found!")
    {
        echo "Er is wat fout gegaan, we hebben geen gebruiker gevonden!";
    }else
    {
        setcookie("CurrUser", (new user($user))->getId(), time() + 3600, "/", "");
        header('location: ../Activities/overview.php');
    }
}
?>

<html>
<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  -->
    <link rel="stylesheet" href="../../Css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
    

</head>
<body>   
    <div class="container">
        <div class="infoCard">
            <p class="text p">Welke activiteiten zijn er de komende tijd</p>
            <h1 class="text h1">Login</h1>
            <p class="text omschrijving">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat ratione molestias iure suscipit, ullam magnam eveniet provident praesentium voluptatibus iusto illo optio enim? Blanditiis dicta vitae, provident excepturi, quae optio aliquid, aspernatur nostrum aliquam officia recusandae. Repudiandae, nesciunt rerum explicabo odit soluta laudantium sint ipsa iusto assumenda eum consectetur!</p>
        </div> 
        <div class="login"> 

            <!-- <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?> -->

            <form action="" method="post">
                <div class="form-group">
                    <!-- <label>Username</label> -->
                    <h3>Gebruikersnaam</h3>
                    <input type="text" name="username" class="form-control" value="" required>
                </div>    
                <div class="form-group">
                    <!-- <label>Password</label> -->
                    <h3 class="titleh3">Wachtwoord</h3>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" value="Login" name="submit">
                </div>
                <p>Nog geen account? <a class="linkColorText" href="signUp.php">Registreer nu</a>.</p>
                
            </form>
        </div>
    </div>  
</body>


</html>


<?php
require_once "../General/footer.php";
?>