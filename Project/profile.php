<?php
session_start();
$db_host = "localhost";
$db_name = "db";
$db_user = "mydatabase_admin";
$db_pass = "admin";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="JS/help.js"></script>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body{
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        color:#000;

    }
</style>
<body>
<div class="header">
    <h2>Profile</h2>
</div>
<div class="content">
    <form>
        <div class="form-group">
            <?php if (isset($_SESSION["username"])): ?>
            <form>
                <p class="text-primary">Username: <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p><a href="Profile/editUsername.php">Change username</a></p>
                <p><a href="Profile/changePassword.php">Change password</a></p>
                <p id="p1">Click the button below to see the phone number</p>
                <button type="button" class="btn btn-success" id="btn"  style="background-color: #8a2be2;">Call Center</button>
            </form>
            <?php endif ?>
        </div>
    </form>
</div>
</body>
</html>

