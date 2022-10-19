<?php
session_start();
// UID SESSION
require_once("includes/plugins/cookie.plugins.php");
// COOKIE SESSION
if(isset($_COOKIE['LOGIN']) && empty($_SESSION['player'])){
    header("location: includes/inc/services/cookie.inc.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Card</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/sidenav.css">
    </head>
    <body>
        <!--MENU-->
        <div class="sidenav">
            <a href="home.php">Home</a><br>
            <hr>
            <a href="ranking.php">Ranking</a><br>
            <hr>
            <a href="includes/inc/logout.inc.php">Logout</a><br>
            <hr>
        </div>
        <!--BODY-->
        <div class="main">
            <h1>Card game by Asdeki team</h1>
            <hr>
            <!--PERSONAL DATA-->
            <div class="personal">
                <?php require_once("includes/plugins/personal.plugins.php");?>
            </div>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/personal.js"></script>
    </body>
</html>