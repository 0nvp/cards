<?php
session_start();
// UID SESSION
require_once("includes/plugins/cookie.plugins.php");
// COOKIE SESSION
if(isset($_COOKIE['LOGIN']) && empty($_SESSION['player'])){
    header("location: includes/inc/cookie.inc.php");
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
            <h1>Card game by Asdeki team v.0.2.2</h1>
            <hr>
            <!--ALERT-->
            <div class="alert">
                <?php if(isset($_COOKIE['alert'])){print $_COOKIE['alert'];setcookie("alert", "", time() - 10, "/");}?>
            </div>
            <!--PERSONAL DATA-->
            <div id="personal" class="personal">
                <?php require_once("includes/plugins/personal.plugins.php");?>
            </div>
            <!--PASSWORD-->
            <div id="password" class="password">
                <?php require_once("includes/plugins/password.plugins.php");?>
            </div>
            <!--REMOVE ACCOUNT-->
            <div id="drop" class="drop">
                <?php require_once("includes/plugins/drop.plugins.php");?>
            </div>
        </div>
    </body>
</html>