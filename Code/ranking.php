<?php
session_start();
// UID SESSION
require_once("includes/plugins/services/cookie.plugins.php");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Card</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/sidenav.css">
        <link rel="stylesheet" type="text/css" href="css/ranking.css">
    </head>
    <body>
        <!--MENU-->
        <div class="sidenav">
            <a href="home.php">Home</a><br>
            <hr>
            <a href="profile.php">Profile</a><br>
            <hr>
            <a href="includes/inc/logout.inc.php">Logout</a><br>
            <hr>
        </div>
        <!--BODY-->
        <div class="main">
            <h1>Card game by Asdeki team</h1>
            <hr>
            <div class="ranking">
                <?php require_once("includes/plugins/ranking.plugins.php");?>
            </div>
        </div>
    </body>
</html>