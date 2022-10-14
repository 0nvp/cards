<?php
session_start();
// UID SESSION
require_once("includes/plugins/cookie.plugins.php");
// COOKIE SESSION
if(isset($_COOKIE['LOGIN']) && empty($_SESSION['player'])){
    header("location: includes/inc/cookie.inc.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Card</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/sidenav.css">
    </head>
    <body>
        <!--MENU-->
        <div class="sidenav">
            <a href="home.php">Home</a><br>
            <hr>
            <a href="ranking.php">Ranking</a><br>
            <hr>
            <a href="includes/inc/logout.inc.php">Logout</a><br>
            <hr>
        </div>
        <!--BODY-->
        <div class="main">
            <h1>Card game by Asdeki team</h1>
            <hr>
            <!--ALERT-->
            <div class="alert">
                <?php if(isset($_COOKIE['alert'])){print $_COOKIE['alert'];setcookie("alert", "", time() - 10, "/");}?>
            </div>
            <!--PERSONAL DATA-->
            <div id="username" class="personal">
                <?php print "Username: {$_SESSION['player']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reUsername()\">edit</span>";?>
            </div>
            <div id="email" class="personal">
                <?php print "Email: {$_SESSION['player']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span>";?>
            </div>
            <!--PASSWORD-->
            <div id="password" class="personal">
                <?php print "Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span>";?>
            </div>
            <!--REMOVE ACCOUNT-->
            <div id="drop" class="personal">
                <span id="delAcc" style="color:blue;cursor:pointer;" onclick="delAcc()">Delete account</span>
            </div>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/personal.js"></script>
    </body>
</html>