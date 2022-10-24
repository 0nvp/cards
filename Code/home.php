<?php
session_start();
// UID SESSION
require_once("includes/plugins/services/cookie.plugins.php");
// COOKIE SESSION
if(isset($_COOKIE['LOGIN']) && empty($_SESSION['data'])){
    header("location: includes/inc/services/cookie.inc.php");
    exit();
}
// AJAX
require_once("includes/plugins/ajaxes/home/main.ajax.php");
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
            <span onclick="sideNav('home')">Home</span><br>
            <hr>
            <span onclick="sideNav('profile')">Profile</span><br>
            <hr>
            <span onclick="sideNav('ranking')">Ranking</span><br>
            <hr>
            <a href="includes/inc/services/logout.inc.php">Logout</a><br>
            <hr>
        </div>
        <!--BODY-->
        <div class="main" id="main">
            <h1>Card game by The Asdeki Team</h1>
            <hr>
            <!--ERROR MSG-->
            <div id="alert">
                <?php require_once("includes/plugins/alerts/home.plugins.php");?>
            </div>
            <?php print "<h3>Welcome, {$_SESSION['data']['username']}!</h3>";?>
            <a href="includes/inc/game.inc.php">game</a>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/home.js"></script>
        <script src="js/personal.js"></script>
    </body>
</html>