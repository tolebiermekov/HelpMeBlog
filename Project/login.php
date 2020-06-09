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

$sql = "SELECT * FROM posts;";

$result = mysqli_query($conn, $sql);


if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

if (isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn , $_POST['username']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);

    if (empty($username)){
        array_push($errors, "Username is required");
    }
    if (empty($password)){
        array_push($errors, "Password is required");
    }
    if (count($errors) == 0){
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1){
            $_SESSION['username'] = $username;
            header('location: index.php');
        }else{
            array_push($errors, "The username or password is incorrect");

        }
    }
}
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="JS/hover.js"></script>
</head>
<body>
<div class="header">
    <h2>Login</h2>
</div>
<form method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
        <button type="submit" name="guest" class="btn"><a href="index.php" style="text-decoration: none; color: white;">Continue as a guest</a></button>
    </div>
    <p>Not yet registred? <a href="register.php">Sign up</a></p>
</form>
</body>
</html>