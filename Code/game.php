<?php
session_start();
// UID SESSION
require_once("includes/plugins/services/cookie.plugins.php");
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
        <!--IMG-->
        <div class="table">
            <img src="images/icons/table.png" width="1024" height="816" alt="table">
            <!--NUMBER OF CARDS-->
            <div id="computer">
                <?php print count($_SESSION['computer']['array']);?>
            </div>
            <div id="user">
                <?php print count($_SESSION['player']['array']);?>
            </div>
        </div>
        <!--GAME-->
        <div class="game">
            <?php require_once("includes/plugins/games/deck.plugins.php");?>
        </div>
        <!--MENU-->
        <div id="menu" class="menu">
            <?php if(empty($_SESSION['game']['status'])){
            print "<img style=\"cursor:pointer;\" src=\"images/cards/default/back_of_card.png\" 
            alt=\"back_of_card\" width=\"197px\" height=\"311px\" onclick=\"ajaxCard('nextRound')\">";
            }
            else{
            print "<img style=\"cursor:pointer;\" src=\"images/icons/password.png\" 
            alt=\"back_of_card\" width=\"197px\" height=\"311px\" onclick=\"ajaxCard('test')\">";
            }
            ?>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/ajax.js"></script>
    </body>
</html>