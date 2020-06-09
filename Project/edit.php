<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <?php
    session_start();
    $db_host = "localhost";
    $db_name = "db";
    $db_user = "mydatabase_admin";
    $db_pass = "admin";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $sql = "SELECT * FROM posts;";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "UPDATE posts SET title = '".$_POST['title']."', content = '".$_POST['content']."'
         WHERE postID = '".$_POST['postID']."'";
        $results = mysqli_query($conn, $sql);
        if ($results === false){
            echo mysqli_error($conn);
        }else{
            echo 'Changes were saved in order to check it please back to home page -->';
        }

    }
    ?>
</head>

<body>

<a href="index.php"><button>BACK TO HOME PAGE</button></a>
<h2>Update</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="number" id="postID" name="postID" placeholder="Enter article ID of the post"><br>
    <input type="text" id="title" name="title" placeholder="Enter the title of the post"><br>
    <input type="text" id="content" name="content" placeholder="Enter the content of the post"><br>
    <button>Update</button>
</form>


</body>
</html>

