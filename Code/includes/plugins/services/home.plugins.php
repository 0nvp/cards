<?php
if(isset($_GET['p'])){
    $_SESSION['p']=$_GET['p'];
}
switch($_SESSION['p']){
    case "profile":
        // XP SYSTEM
        $xp=round((($_SESSION['data']['level']+1)**3)/1.092*1.09+($_SESSION['data']['level']+1)*2*10+5);
        $pro=round($_SESSION['data']['xp']*100/$xp);
        // LOGO
        print "\t<h1>Card game by The Asdeki Team</h1><hr>[Lvl {$_SESSION['data']['level']}] {$_SESSION['data']['username']}";
        // LEVEL BAR
        print "<div class=\"level\"><div id=\"procenty\" style=\"width:$pro%;background-color:#808080;color:#ffffff;cursor:pointer;\">
        $pro% ({$_SESSION['data']['xp']}/$xp XP)</div></div><br><br>";
        // PERSONAL DATA
        print "<hr><div class=\"personal\"><h1>Personal data</h1><br><br>";
        print "<div id=\"username\">Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" 
        onclick=\"reUsername()\">edit</span></div>";
        print "<div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span></div>";
        print "<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span></div><br><br><br><br>";
        print "<br><br><div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"delAcc()\">Delete account</span></div></div>\n";
        break;
    case "ranking":
        // LOGO
        print "\t<h1>Card game by Asdeki team</h1><hr><div class=\"ranking\">";
        // RANKING
        print "<table><thead><tr><td>Top</td><td>Username</td><td>Gold</td></tr></thead><tbody>";
        $i=0;
        foreach($_SESSION['ranking']['array'] as $ranking){
            $i+=1;
            print "<tr><td>#{$i}</td><td>[Lvl {$ranking['level']}] {$ranking['username']}</td><td>{$ranking['gold']}</td></tr>";
        }
        print "</tbody></table></div>\n";
        break;
    default:
        // LOGO
        print "\t<h1>Card game by The Asdeki Team</h1><hr><h3>Welcome, {$_SESSION['data']['username']}!</h3>
        <a href=\"includes/inc/games/game.inc.php\">game</a>\n";
        break;
}
?>