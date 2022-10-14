<?php
print "<!--COMPUTER DECK-->
<div class=\"deck-computer\">
<div class=\"card\"><img src=\"images/cards/default/".end($_SESSION['computer']['array']).".png\" 
alt=\"".end($_SESSION['computer']['array'])."\" width=\"197px\" height=\"311px\"></div>
<div class=\"deck\"><img src=\"images/cards/default/back_of_card.png\" alt=\"back_of_card\" width=\"197px\" height=\"311px\"></div>
</div>";
print "<!--PLAYER DECK-->
<div class=\"deck-user\">
<div class=\"card\"><img src=\"images/cards/default/".end($_SESSION['player']['array']).".png\" 
alt=\"".end($_SESSION['player']['array'])."\" width=\"197px\" height=\"311px\"></div>
</div>";
?>