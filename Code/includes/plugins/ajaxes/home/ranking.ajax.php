<?php
print "<h1>Card game by Asdeki team</h1><hr><div class=\"ranking\">";
print "<table><thead><tr><td>Username</td><td>Level</td><td>Top</td></tr></thead><tbody>";
// RANKING
foreach($_SESSION['ranking']['array'] as $ranking){
print "<tr><td>{$ranking['username']}</td><td>{$ranking['level']}</td><td>{$ranking['top']}</td></tr>";
}
// TABLE
print "</tbody></table></div></div>";
?>