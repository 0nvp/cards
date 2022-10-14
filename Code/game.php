<?php
session_start();
// UID SESSION
require_once("includes/plugins/cookie.plugins.php");
// AJAX REQUEST
require_once("includes/inc/ajax.inc.php");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Card</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/game.css">
    </head>
    <body>
        <!--TABLE-->
        <div class="table">
            <img src="images/icons/table.png" width="1024" height="816" alt="table">
            <!--COUNT CARDS-->
            <div id="computer">
                <?php print count($_SESSION['computer']['array']);?>
            </div>
            <div id="user">
                <?php print count($_SESSION['player']['array']);?>
            </div>
        </div>
        <div class="game">
            <?php require_once("includes/plugins/deck.plugins.php");?>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/ajax.js"></script>
    </body>
</html>