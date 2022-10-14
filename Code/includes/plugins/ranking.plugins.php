<?php
print "<table><thead><tr><td>====>> Username <<====</td><td>===>> Player <<===</td><td>===>> Computer <<===</td><td>===>> Time <<===</td><td>===>> Win <<==</td></tr></thead>
<tbody>";
foreach($_SESSION['ranking']['array'] as $ranking){
    print "<tr><td>{$ranking['username']}</td><td><span style=\"display:flex;position:relative;\">";
    foreach($_SESSION['player']['array'] as $deck1){print "<div class=\"card\"><img src=\"images/cards/default/{$deck1}.png\" 
    alt=\"{$deck1}\" width=\"50px\" height=\"78px\"></div>";}
    print "</span></td><td><span style=\"display:flex;position:relative;\">";
    foreach($_SESSION['computer']['array'] as $deck2){print "<div class=\"card\"><img src=\"images/cards/default/{$deck2}.png\" 
    alt=\"{$deck2}\" width=\"50px\" height=\"78px\"></div>";}
    print "</span></td><td>{$ranking['time']}</td><td>{$ranking['win']}</td></tr>";
}
print "</tbody></table>";
?>