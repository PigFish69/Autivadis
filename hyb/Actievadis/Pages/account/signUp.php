<?php
require_once "../header.php";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
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
            <div class="form-group">
                <input type="submit" class="buttonPrimair" value="Submit" name="submit">
            </div>
            <p>Heb je al een account? <a href="login.php" class="linkColorText">Login hier</a>.</p>
        </form>
    </div>    
</body>
</html>

<?php
require_once "../footer.php";
?>