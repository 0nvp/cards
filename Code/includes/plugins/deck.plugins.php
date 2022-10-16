<?php
// COMPUTER DECK
if(count($_SESSION['computer']['array'])>0){
    print "<!--COMPUTER DECK--><div class=\"deck-computer\">
    <div class=\"card\"><img src=\"images/cards/default/".current($_SESSION['computer']['array']).".png\" 
    alt=\"".current($_SESSION['computer']['array'])."\" width=\"197px\" height=\"311px\"></div></div>";
}
// PLAYER DECK
if(count($_SESSION['player']['array'])>0){
    print "<!--PLAYER DECK--><div class=\"deck-user\">
    <div class=\"card\"><img src=\"images/cards/default/".current($_SESSION['player']['array']).".png\" 
    alt=\"".current($_SESSION['player']['array'])."\" width=\"197px\" height=\"311px\"></div>
    </div>";
}
?>