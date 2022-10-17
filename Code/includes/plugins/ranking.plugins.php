<?php
// TABLE
print "<table><thead><tr><td>Username</td><td>Cards</td><td>Time</td><td>Win</td></tr></thead><tbody>";
// RANKING
foreach($_SESSION['ranking']['array'] as $ranking){
    $i=0;
    print "<tr><td>{$ranking['username']}</td><td><span style=\"display:flex;\">";
    // CARDS
    foreach($_SESSION['player']['array'] as $deck){
        $i++;
        print "<div class=\"card\"><img src=\"images/cards/default/{$deck}.png\" 
        alt=\"{$deck}\" width=\"50px\" height=\"78px\"></div>";
        if($i==18){
            print "</span><span style=\"display:flex;\">";
        }
        if($i==36){
            print "</span><span style=\"display:flex;\">";
        }
    }
    // RANKING
    print "</span></td><td>{$ranking['time']}</td><td>{$ranking['win']}</td></tr>";
}
// TABLE
print "</tbody></table>";
?>