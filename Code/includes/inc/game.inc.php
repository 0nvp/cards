<?php
session_start();
require_once("card.inc.php");
$_SESSION['computer']['array']=[];
$_SESSION['player']['array']=[];
$_SESSION['ace']=1;
$_SESSION['jack']=1;
$_SESSION['queen']=1;
$_SESSION['king']=1;
for($i=1;$i<=20;$i++){card("computer");}
for($i=1;$i<=20;$i++){card("player");}
header("location: ../../game.php");
exit();
?>