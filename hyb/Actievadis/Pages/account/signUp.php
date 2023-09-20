<?php
require_once "../General/header.php";
require_once "../../Database/userFunctions.php";

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $beheer   = $_POST['beheerPassword'];
    if(!empty($beheer))
    {
        
    }

    insertUser($username, $password);

    echo "Registeren is gelukt! Je kan na inloggen";

}
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
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
    <div class="login">
        <h2 class="bold">Registreer</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="">
            </div>
            <!-- <div class="form-group" id="beheer">
                <label>Beheer password</label>
                <input type="password" name="beheerPassword" class="form-control" value="">
            </div>
            <div class="form-check">
                <input type="checkbox" name="beheerCheck" class="form-check-input">
                <label>klik voor beheer</label>
            </div> -->
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Submit" name="submit">
            </div>
            <p>Heb je al een account? <a href="inlog.php" class="linkColorText">Login hier</a>.</p>
        </form>
    </div>    
</body>
</html>

<?php
require_once "../General/footer.php";
?>