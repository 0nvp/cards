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
            <a href="profile.php">Profile</a><br>
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
            <?php print "<h3>Welcome, {$_SESSION['player']['username']}!</h3>";?>
            <a href="includes/inc/game.inc.php">game</a>
        </div>
    </body>
</html>