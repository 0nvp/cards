<?php
if(count($_SESSION['computer']['array'])>0){
    print "<!--COMPUTER DECK--><div class=\"deck-computer\">
    <div class=\"card\"><img src=\"images/cards/default/".current($_SESSION['computer']['array']).".png\" 
    alt=\"".current($_SESSION['computer']['array'])."\" width=\"197px\" height=\"311px\"></div>";
}
print "<div class=\"deck\"><img style=\"cursor:pointer;\" src=\"images/cards/default/back_of_card.png\" alt=\"back_of_card\" width=\"197px\" height=\"311px\" 
onclick=\"ajaxCard('add')\"></div></div>";
if(count($_SESSION['player']['array'])>0){
    print "<!--PLAYER DECK--><div class=\"deck-user\">
    <div class=\"card\"><img src=\"images/cards/default/".current($_SESSION['player']['array']).".png\" 
    alt=\"".current($_SESSION['player']['array'])."\" width=\"197px\" height=\"311px\"></div>
    </div>";
}
?>