<?php
session_start();
// UID SESSION
require_once("includes/plugins/services/cookie.plugins.php");
// COOKIE SESSION
if(isset($_COOKIE['LOGIN']) && empty($_SESSION['data'])){
    header("location: includes/inc/services/cookie.inc.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>HOME :: The Azdeki Team</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/sidenav.css">
    </head>
    <body>
        <!--MENU-->
        <div class="sidenav">
            <span onclick="sideNav('home')">Home</span><br>
            <hr>
            <span onclick="sideNav('profile')">Profile</span><br>
            <hr>
            <span onclick="sideNav('ranking')">Ranking</span><br>
            <hr>
            <a href="includes/inc/services/logout.inc.php">Logout</a><br>
            <hr>
        </div>
        <!--ERROR MSG-->
        <div id="alert">
            <?php require_once("includes/plugins/alerts/home.plugins.php");?>
        </div>
        <!--BODY-->
        <div class="main" id="main">
            <?php require_once("includes/plugins/services/home.plugins.php");?>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/home.js"></script>
        <script src="js/personal.js"></script>
    </body>
</html>