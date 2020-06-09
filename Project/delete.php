<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/delete.css">
</head>
<?php
$db_host = "localhost";
$db_name = "db";
$db_user = "mydatabase_admin";
$db_pass = "admin";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$sql = "DELETE FROM posts WHERE postID ='" . $_GET["postID"] . "'";
if (mysqli_query($conn, $sql)) {
    echo " <h2> Post deleted successfully </h2> <br> <p>Your post was deleted. You can check it on home page.</p>";
} else {
    echo "Error with deleting:" . mysqli_error($conn);
}
mysqli_close($conn);


?>
<body>

<br><br><a href="index.php"><button>BACK TO HOME PAGE</button></a>


</body>
</html>

