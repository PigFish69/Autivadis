<?php
require_once "../General/header.php";
require_once "../../Database/userFunctions.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    insertUser($username, $password);

    echo "Registeren is gelukt! Je kan na inloggen";

}
?>

<html>
<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  -->
    <link rel="stylesheet" href="../../Css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600;700&family=Open+Sans:wght@500;600;800&family=Rubik:wght@500&display=swap" rel="stylesheet">
    <script src="../../Js/jquery.js"></script>
    <script>
    $(document).ready(function(){
        $('#beheer').hide();

        $('input[type="checkbox"]').click(function(){
                $("#beheer").toggle(500);          
        });
    });
</script>
</head>
<body>  
    <div class="container">
        <div class="infoCard">
            <p class="text p">Meld je aan om ook mee te doen aan onze activiteiten</p>
            <h1 class="text h1">Registreer</h1>
            <p class="text omschrijving">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic quaerat ratione molestias iure suscipit, ullam magnam eveniet provident praesentium voluptatibus iusto illo optio enim? Blanditiis dicta vitae, provident excepturi, quae optio aliquid, aspernatur nostrum aliquam officia recusandae. Repudiandae, nesciunt rerum explicabo odit soluta laudantium sint ipsa iusto assumenda eum consectetur!</p>
        </div> 
        <div class="login"> 
            <form action="" method="post">
                <div class="form-group">
                    <h3>Gebruiker</h3>
                    <input type="text" name="username" class="form-control" value="" required>
                </div>    
                <div class="form-group">
                    <h3  class="titleh3">Wachtwoord</h3>
                    <input type="password" name="password" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <h3  class="titleh3">Bevestig Wachtwoord</h3>
                    <input type="password" name="confirm_password" class="form-control" value="" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning" value="Submit" name="submit">
                </div>
                <p>Heb je al een account? <a href="login.php" class="linkColorText">Login hier</a>.</p>
            </form>
        </div>
    </div>    
</body>
</html>

<?php
require_once "../General/footer.php";
?>