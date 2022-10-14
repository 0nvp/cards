<?php
session_start();
// UID SESSION
require_once("includes/plugins/cookie.plugins.php");
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
            <h1>Card game by Asdeki team v.0.2.2</h1>
            <hr>
            <table>
                <thead>
                    <tr>
                        <td>====>> Username <<====</td>
                        <td>===>> Deck1 <<===</td>
                        <td>===>> Deck2 <<===</td>
                        <td>===>> Time <<===</td>
                        <td>===>> Win <<==</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($_SESSION['player']['array'] as $user){$test.="<div class=\"card\"><img src=\"images/cards/default/{$user}.png\" 
                alt=\"{$user}\" width=\"20px\" height=\"32px\"></div>";} 
                foreach($_SESSION['ranking']['array'] as $ranking){
                    print "<tr><td>{$ranking['username']}</td><td><span style=\"display:flex;position:relative;\">{$test}</span></td><td><span style=\"display:flex;position:relative;\">{$test}</span></td><td>{$ranking['time']}</td><td>{$ranking['win']}</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>