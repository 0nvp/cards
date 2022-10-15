<?php
session_start();
require_once("card.inc.php");
$_SESSION['computer']['array']=[];
$_SESSION['player']['array']=[];
$_SESSION['deck']['ace']=0;
$_SESSION['deck']['jack']=0;
$_SESSION['deck']['queen']=0;
$_SESSION['deck']['king']=0;
for($i=2;$i<=10;$i++){$_SESSION['deck'][$i]=0;}
for($i=1;$i<=26;$i++){card("computer");}
for($i=1;$i<=26;$i++){card("player");}
header("location: ../../game.php");
exit();
?>