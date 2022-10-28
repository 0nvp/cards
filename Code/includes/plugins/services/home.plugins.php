<?php
if(isset($_GET['p'])){
    $_SESSION['p']=$_GET['p'];
}
switch($_SESSION['p']){
    case "profile":
        $xp=round((($_SESSION['data']['level']+1)**3)/1.092*1.09+($_SESSION['data']['level']+1)*2*10+5);
        $pro=$_SESSION['data']['xp']*100/$xp;
        print "\t<div class=\"main\" id=\"main\"><h1>Card game by The Asdeki Team</h1><hr>{$_SESSION['data']['username']} | Level: {$_SESSION['data']['level']}";
        print "<div class=\"level\"><div id=\"procenty\" style=\"width:$pro%;background-color:#808080;color:#ffffff;\">{$_SESSION['data']['xp']}/$xp XP</div></div><br><br><hr>";
        print "<div class=\"personal\"><h1>Personal data</h1><br><br>";
        print "<div id=\"username\">Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" 
        onclick=\"reUsername()\">edit</span></div>";
        print "<div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span></div>";
        print "<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span></div><br><br><br><br>";
        print "<br><br><div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"confirmDelAcc()\">Delete account</span></div></div></div>\n";
        break;
    case "ranking":
        print "\t<div class=\"main\" id=\"main\"><h1>Card game by Asdeki team</h1><hr><div class=\"ranking\">";
        print "<table><thead><tr><td id=\"user\">Username</td><td>Level</td></tr></thead><tbody>";
        foreach($_SESSION['ranking']['array'] as $ranking){
            print "<tr><td id=\"user\">{$ranking['username']}</td><td>{$ranking['level']}</td></tr>";
        }
        print "</tbody></table></div></div>\n";
        break;
    default:
        print "\t<div class=\"main\" id=\"main\"><h1>Card game by The Asdeki Team</h1><hr><h3>Welcome, {$_SESSION['data']['username']}!</h3>
        <a href=\"includes/inc/game.inc.php\">game</a></div>\n";
        break;
}
?>