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

$sql = "SELECT * FROM posts;";
$res = mysqli_query($conn, $sql);



$sql = "SELECT * FROM posts;";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "INSERT INTO posts (title, content, id) VALUES ('". $_POST['title'] ."',
        '". $_POST['content'] ."', '". $_POST['id'] ."' )";
}
$results = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);

function MyFunction()
{
    $message = "You are on HelpMe";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
MyFunction();


?>
<!DOCTYPE html>
<html>
<head>
    <title>HelpMe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="JS/help.js"></script>
</head>
<style>
    *{
        margin:0;
        padding:0;
    }

    body{
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        color:#000
    }
    header{
        width:100%;
        background:#000;
        display:flex;
        position: fixed;
    }
    a{
        text-decoration: none;
    }
    .logo{
        text-transform: uppercase;
        color: #fff;
        font-weight: 800;
        font-size:24px;
        cursor: pointer;
        margin-top: 46px;
        margin-left: 7%;
    }
    nav{
        margin-top: 56px;
        margin-left: 47%;
    }
    .topnav a{
        color:  #fff;
        text-align: center;
        padding: 12px 16px;
        font-weight: bold;
        text-decoration: none;
    }
    .topnav a:hover{
        border-bottom: 3px solid #8a2be2;
        color: white;
    }
    .main_welcome{
        background: url(img/back.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        padding: 260px 0 410px 0;
        padding-left: 100px;
    }
    .main_welcome h1, p{
        color: #fff;
    }
    .main_welcome h1:after{
        display: none;
    }
    .companyName{
        color: #8a2be2;
    }
    #btn a{
        color: #fff;
        text-decoration: none;
    }

</style>
<body>
<header>
    <div class="logo">
        <p>HELP<spam class = "companyName">ME</spam></p>
    </div>
    <nav>
        <div class="topnav">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#stories">Stories</a>
            <a href="#share">Share</a>

            <?php if (isset($_SESSION["username"])){ ?>
            <a href="profile.php"> <strong><?php echo $_SESSION['username']; ?></a>
            <a href="index.php?logout='1'" style="color: red;">Logout</a>
            <?php }else{ ?>
            <a href="login.php">Login | Register</a>
            <?php } ?>
        </div>
    </nav>
</header>

<main>


    <div class="main_welcome" id="home">
        <h1 >Welcome on Help<spam class = "companyName">Me</spam></h1><br>
        <p><i>Here people share with their experience and solved problems.</i></p>
        <p><i>Be a part of success community.</i></p><br>
        <button type="button" class="btn btn-success" id="btn"  style="background-color: #8a2be2;"> Need Help</button>
        <br><p id="p1"></p>
    </div>





    <div class="main_user" id="about">
        <h1>ABOUT</h1>
        <p><i>This website for people who want share their life experience, success in life and etc.</i><br>
        <i>In order to help everyone who occurs such problems and obstacles.
            <br>In order to share with your experience to the world please sign up or sign in.</i></p>
    </div>






    <div id="stories" class="main_stories">
        <h1>Stories</h1>
    </div>
<?php

while($row = mysqli_fetch_array($res)) {
    ?>
    <div class="container" >
        <div class="col-md-12">
            <hr>
            <h1><?php echo "<b> ". $row["title"] . "</b>"; ?></h1>
            <p><?php echo $row["content"]; ?></p>
            </div>
            <hr>
        </div>
    </div>
    <?php

}
?>
    <?php if (isset($_SESSION["username"])): ?>
    <div id="stories" class="main_stories">
        <h1>My Stories</h1>
    </div>
    <?php
        $sql = "SELECT * FROM posts WHERE id in (SELECT id FROM users WHERE username = '". $_SESSION['username'] ."') ";
        $re = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($re)) {
    ?>
    <div class="container" >
        <div class="col-md-12">
            <hr>
            <h1><?php echo "<b> ". $row["title"] . "</b>"; ?></h1>
            <p><?php echo $row["content"]; ?></p>

            <div>
                <span class="badge"><?php echo  "Article ID: ". $row["postID"]; ?></span>

                <div class="pull-right">
                    <a href="edit.php"><span class="label label-primary" id="edit"> Edit</span></a>
                    <span class="label label-danger"><a href="delete.php?postID=<?php echo $row["postID"]; ?>">Delete</a></span>
                </div>

            </div>
            <hr>
        </div>
    </div>
    <?php

}
?>
    <?php endif ?>


    <?php if (isset($_SESSION["username"])): ?>
    <div class="main_share" id="share">
        <h1>Share your story</h1>
        <a>
                <?php
                $sql = "SELECT id FROM users WHERE username = '". $_SESSION['username'] ."';";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <p>Your personal ID is: <i><?php echo $row["id"];?></i>.<br>
                    Use it in order to post story and never share your ID.<br>
                        By sharing the post you can be sure that it will be anonymous.
                        Here you can share your story with the whole world.</p>
            <a href="myPost.php"><input type="button" class="btn btn-success" value="POST" style="background-color: #8a2be2; width: 58%; letter-spacing: 3px;"></a>
                    <?php
                }
                ?>
        </div>


    </div>
    <?php endif ?>
</main>




<footer>
    <div id="contact">
        <div class="social" id="soc">
            <a href="https://twitter.com/ermekovt" target="_blank"><img src="img/twitter.png" alt="" ></a>
            <a href="https://www.youtube.com/channel/UC-58ofRASzF6ryQWLOIkIJQ" target="_blank"><img src="img/youtube.png" alt=""></a>
            <a href="https://www.facebook.com/tolebi.ermekov?ref=bookmarks" target="_blank"><img src="img/facebook.png" alt=""></a>
            <a href="https://plus.google.com/114942969599228822715" target="_blank"><img src="img/google-plus.png" alt=""></a>
            <a href="https://www.instagram.com/tolebiermekov" target="_blank"><img src="img/instagram.png" alt=""></a>
        </div>
    </div>
    <p class="copy"><i>Copyright</i> &copy <script src="JS/date.js"></script> All rights reserved.</p>

</footer>
</body>
</html>