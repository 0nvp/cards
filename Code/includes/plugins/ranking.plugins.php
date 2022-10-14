<?php
print "<table><thead><tr><td>====>> Username <<====</td><td>===>> Cards <<===</td><td>===>> Time <<===</td><td>===>> Win <<==</td></tr></thead>
<tbody>";
foreach($_SESSION['ranking']['array'] as $ranking){
    print "<tr><td>{$ranking['username']}</td><td><span style=\"display:flex;position:relative;\">";
    foreach($_SESSION['player']['array'] as $deck){print "<div class=\"card\"><img src=\"images/cards/default/{$deck}.png\" 
    alt=\"{$deck}\" width=\"50px\" height=\"78px\"></div>";}
    print "</span></td><td>{$ranking['time']}</td><td>{$ranking['win']}</td></tr>";
}
print "</tbody></table>";
?>