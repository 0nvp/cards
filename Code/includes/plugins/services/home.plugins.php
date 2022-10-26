<?php
if(empty($_GET['p'])){
    $_GET['p']="home";
}
if(isset($_GET['p'])){
switch($_GET['p']){
    case "profile":
        print "<div class=\"main\" id=\"main\"><h1>Card game by The Asdeki Team</h1><hr><!--PERSONAL DATA--><div class=\"personal\">";
        print "Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reUsername()\">edit</span></div>";
        print "<div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span></div>";
        print "<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span></div>";
        print "<div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"confirmDelAcc()\">Delete account</span></div></div></div>";
        break;
    case "ranking":
        print "<div class=\"main\" id=\"main\"><h1>Card game by Asdeki team</h1><hr><div class=\"ranking\">";
        print "<table><thead><tr><td>Username</td><td>Level</td><td>Top</td></tr></thead><tbody>";
        foreach($_SESSION['ranking']['array'] as $ranking){
            print "<tr><td>{$ranking['username']}</td><td>{$ranking['level']}</td><td>{$ranking['top']}</td></tr>";
        }
        print "</tbody></table></div></div>";
        break;
    default:
        print "<div class=\"main\" id=\"main\"><h1>Card game by The Asdeki Team</h1><hr><h3>Welcome, {$_SESSION['data']['username']}!</h3>
        <a href=\"includes/inc/game.inc.php\">game</a></div>";
        break;
}}
?>