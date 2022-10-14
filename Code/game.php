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
        <link rel="stylesheet" type="text/css" href="css/game.css">
    </head>
    <body>
        <div class="game">
            <?php require_once("includes/plugins/deck.plugins.php");?>
        </div>
        <div class="menu">
        </div>
    </body>
</html>