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
    <!--AJAX-->
    <script src="js/ajax.js"></script>
        <!--COMPUTER ICON-->
        <div id="icon-computer">
            <img src="images/icons/icon_computer.png" alt="icon_computer" width="197px" height="311px">
        </div>
        <!--COMPUTER DECK-->
        <div class="deck-computer">
            <?php for($i=0;$i<count($_SESSION['computer']['array']);$i++){print "<div class=\"card\"><img src=\"images/cards/default/back_of_card.png\" alt=\"back_of_card\" width=\"197px\" height=\"311px\"></div>";}?>
        </div>
        <!--PLAYER ICON-->
        <div id="icon-user">
            <img src="images/icons/icon_user.png" alt="icon_panel" width="197px" height="311px">
        </div>
        <!--PLAYER DECK-->
        <div class="deck-user">
            <?php foreach($_SESSION['player']['array'] as $user){print "<div class=\"card\"><img src=\"images/cards/default/{$user}.png\" 
alt=\"{$user}\" width=\"197px\" height=\"311px\"></div>";}?>
        </div>
        <div class="menu">
            <?php
            //print "<input id=\"draw\" type=\"button\" value=\"card\" onclick=\"ajaxCard('add')\" />";
            ?>
        </div>
    </body>
</html>