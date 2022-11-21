<?php
// HOME PAGE
if(isset($_GET['p'])){
    $_SESSION['p']=$_GET['p'];
}
/*
** SWITCH PAGES
*/
switch($_SESSION['p']){
    case "profile":
        /*
        ** XP SYSTEM
        */
        $xp=round((($_SESSION['data']['level']+1)**3)/1.092*1.09+($_SESSION['data']['level']+1)*2*10+5);
        $pro=round($_SESSION['data']['xp']*100/$xp);
        /*
        ** USER INFO
        */
        print "\t<h1>The Azdeki Team</h1><hr><div class=\"personalInfo\">
        <span id=\"personalAvatar\"><img id=\"personalAvatar\" src=\"images/avatar/{$_SESSION['data']['avatar']}\" alt=\"avatar\"></span>
        <span id=\"personalUser\">[Lvl {$_SESSION['data']['level']}] <span style=\"color:{$_SESSION['data']['color']};\">{$_SESSION['data']['username']}</span></span><br><br>";
        print "<div class=\"personalLevel\"><div id=\"personalPro\" style=\"width:$pro%;\">
        $pro% ({$_SESSION['data']['xp']}/$xp XP)</div></div></div>";
        /*
        ** EDIT PERSONAL DATA
        */
        print "<hr><div class=\"personal\"><h1>Personal data</h1><br><br>";
        print "<div id=\"username\">Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" 
        onclick=\"reUsername()\">edit</span></div>";
        print "<div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span></div>";
        print "<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span></div><br><br><br><br>";
        print "<br><br><div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"delAcc()\">Delete account</span></div></div>\n";
        break;
    case "ranking":
        // LOGO
        print "\t<div class=\"leaderboard-color\"></div><div class=\"leaderboard\"><p><h1>Leaderboard</h1></p>";
        /*
        ** RANKING FOREACH
        */
        foreach($_SESSION['ranking']['array'] as $ranking){
            print "<p id=\"username\">[Lvl {$ranking['level']}] <span style=\"color:{$ranking['color']}\">[{$ranking['tag']}] {$ranking['username']}</span> 
            <span id=\"gold\">{$ranking['gold']}</span></p>";
        }
        print "</div>\n";
        break;
    default:
        // LOGO
        print "\t<h1>The Azdeki Team</h1><hr><h3>Welcome, {$_SESSION['data']['username']}!</h3><a href=\"includes/inc/games/game.inc.php\">game</a>\n";
        break;
}
?>