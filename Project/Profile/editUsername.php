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

if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
$sql = "SELECT * FROM users;";
$result = mysqli_query($conn, $sql);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "UPDATE users SET username = '".$_POST['username']."' WHERE id = '".$_POST['id']."'";
    $results = mysqli_query($conn, $sql);

    if ($results === false){
        echo mysqli_error($conn);
    }else{
        echo 'Changes were saved, to see chanhes logout and sign in again with NEW username';
    }

}
$sql = "SELECT id FROM users WHERE username = '". $_SESSION['username'] ."';";
$result = mysqli_query($conn, $sql);
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
        <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
            ?>
            <p>ID of the  <strong><?php echo $_SESSION['username']; ?></strong> : <?php echo $row["id"];?></p>
            <?php
            $i++;
        }
        ?>
    <?php endif ?>
</div>
<div>
    <form method="POST">
        <div class="form-group">
            <label>ID: </label>
            <input type="number" id="id" name="id" class="form-control" placeholder="Enter user id"><br>
        </div>
        <div class="form-group">
            <label>New Username: </label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter username"><br>
        </div>
        <button class="btn btn-primary btn-lg btn-block"> Edit </button>
    </form>
</div>
</body>
</html>

