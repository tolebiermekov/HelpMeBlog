<?php
session_start();
$db_host = "localhost";
$db_name = "db";
$db_user = "mydatabase_admin";
$db_pass = "admin";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$sql = "SELECT * FROM posts;";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "INSERT INTO posts (title, content, id) VALUES ('". $_POST['title'] ."',
        '". $_POST['content'] ."', '". $_POST['id'] ."' )";
}
$results = mysqli_query($conn, $sql);

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
        h1 {
            text-align: center;
        }
        body{
            background-color: ivory;
        }
    </style>
</head>
<body>
<a href="index.php"><button class="btn btn-primary">BACK TO HOME PAGE</button></a>
<h1>Post a Story</h1>
<form method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">User ID</label>
        <input type="number" class="form-control" id="id" name="id" placeholder="Enter id of the user">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title of the post">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Content</label>
        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter your post here"></textarea>
    </div>
    <button type="submit" class="btn btn-success" style="background-color: #8a2be2; width: 100%; font-size: 24px; letter-spacing: 4px;">Post</button>
</form>
</body>
</html>