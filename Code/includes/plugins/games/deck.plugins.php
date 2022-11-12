<?php
// TO FIX
if(empty($_SESSION['game']['status'])){
    // COMPUTER
    for($i=0;$i<$_SESSION['game']['i'];$i++){
        print "<div class=\"card\"><img src=\"images/cards/default/".$_SESSION['computer']['array'][$i].".png\" 
        alt=\"".$_SESSION['computer']['array'][$i]."\" width=\"197px\" height=\"311px\"></div>";
    }
    // PLAYER
    for($i=0;$i<$_SESSION['game']['i'];$i++){
        print "<div class=\"card\"><img src=\"images/cards/default/".$_SESSION['player']['array'][$i].".png\" 
        alt=\"".$_SESSION['player']['array'][$i]."\" width=\"197px\" height=\"311px\"></div>";
    }
}
if(isset($_SESSION['game']['status'])){
    // COMPUTER
    for($i=1;$i<=$_SESSION['game']['i'];$i++){
        print "<div class=\"card\"><img src=\"images/cards/default/".$_SESSION['computer']['array'][$i].".png\" 
        alt=\"".$_SESSION['computer']['array'][$i]."\" width=\"197px\" height=\"311px\"></div>";
    }
    // PLAYER
    for($i=1;$i<=$_SESSION['game']['i'];$i++){
        print "<div class=\"card\"><img src=\"images/cards/default/".$_SESSION['player']['array'][$i].".png\" 
        alt=\"".$_SESSION['player']['array'][$i]."\" width=\"197px\" height=\"311px\"></div>";
    }
}
?>