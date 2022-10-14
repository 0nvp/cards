<?php
session_start();
require_once("card.inc.php");
$_SESSION['computer']['array']=[];
$_SESSION['player']['array']=[];
for($i=1;$i<=20;$i++){card("computer");}
for($i=1;$i<=20;$i++){card("player");}
header("location: ../../game.php");
exit();
?>