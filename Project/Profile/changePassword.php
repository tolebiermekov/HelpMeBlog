<?php
session_start();
$db_host = "localhost";
$db_name = "db";
$db_user = "mydatabase_admin";
$db_pass = "admin";
$username = "";
$email = "";
$errors = array();
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "UPDATE users SET password = '".md5($_POST['password'])."' WHERE username = '".$_POST['username']."'";
    $results = mysqli_query($conn, $sql);

    if ($results === false){
        echo mysqli_error($conn);
    }else{
        echo 'Changes were saved';
    }

}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        *{
            margin:1px;
            padding:1px;
        }
        body{
            background-color: ivory;
        }
    </style>
</head>
<body>
<div>
    <?php if (isset($_SESSION["username"])): ?>
        <p>Username: <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
</div>
<div>
    <form method="POST">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter username"><br>
        </div>
        <div class="form-group">
            <label>New Password: </label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password"><br>
        </div>
        <button class="btn btn-primary btn-lg btn-block"> Change </button>
    </form>
</div>
</body>
</html>
