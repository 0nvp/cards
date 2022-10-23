<?php
if(isset($_POST['sidenav']) && $_POST['sidenav']=="home"){
    print "<h1>Card game by The Asdeki Team</h1><hr><h3>Welcome, {$_SESSION['data']['username']}!</h3><a href=\"includes/inc/game.inc.php\">game</a></div>";
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="profile"){
    print "<h1>Card game by The Asdeki Team</h1><hr><!--PERSONAL DATA--><div class=\"personal\">";
    // USERNAME
    print "Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reUsername()\">edit</span>
    </div>";
    // EMAIL
    print "<div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span>
    </div>";
    // PASSWORD
    print "<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span>
    </div>";
    // REMOVE
    print "<div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"confirmDelAcc()\">Delete account</span></div></div></div>";
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="ranking"){
    print "<h1>Card game by Asdeki team</h1><hr><div class=\"ranking\">";
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
    print "</tbody></table></div></div>";
    exit();
}
?>