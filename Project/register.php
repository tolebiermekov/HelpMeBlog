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

if (isset($_POST['register'])){
    $username = mysqli_real_escape_string($conn , $_POST['username']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn , $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn , $_POST['password_2']);

    if (empty($username)){
        array_push($errors, "Username is required");
    }
    if (empty($email)){
        array_push($errors, "Email is required");
    }
    if (empty($password_1)){
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2){
        array_push($errors, "Passwords does not match");
    }
    if (count($errors) == 0){
        $password = md5($password_1);
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $sql);
        $_SESSION['username'] = $username;
        header('location: index.php');
    }
}
?>
<html>
    <head>
        <title> Registration</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
        <script src="JS/hover.js"></script>
        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
              rel = "stylesheet">
        <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="JS/info.js"></script>
    </head>
    <body>
        <div class="header">
            <h2>Register</h2>
        </div>
    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username;?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email;?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
            <input type="button" id="click" style="background: #8DC26F; color: white; border-radius: 5px; font-size: 15px;
            width: 20%; height: 5%;" value="Useful info">
            <div id="info" style="display: none; ">Be careful when you use your real name</div>
        </div>
        <p>Already registred? <a href="login.php">Sign in</a></p>
    </form>
    </body>
</html>