<?php
session_start();
// UID SESSION
if(isset($_COOKIE['LOGIN'])){
    header("location: home.php");
    exit();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Card</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <!--ALERT-->
        <div class="alert" style="z-index:1;position:fixed;margin:32% 10%;font-size:30px;font-weight:bold;">
            <?php if(isset($_COOKIE['alert'])){print $_COOKIE['alert'];setcookie("alert", "", time() - 10, "/");}?>
        </div>
        <!--FORM-->
        <div id="login" class="login">
            <h1>Log in</h1>
            <form method="POST" action="includes/inc/login.inc.php">
                <label for="login-email"><img src="images/icons/email.png" width="30px" height="24px" alt="icon"></label>
                <input type="text" name="login-email" placeholder="email" required=""><br>
                <label for="login-password"><img src="images/icons/password.png" width="30px" height="24px" alt="icon"></label>
                <input id="password" type="password" name="login-password" placeholder="password" required=""><br>
                <input type="submit" name="login-submit" value="Login">
                <input type="button" value="Recovery password" onclick="passwd_recovery()">
            </form>
        </div>
        <div id="recovery" class="recovery">
            <?php require_once("includes/plugins/recovery.plugins.php");?>
        </div>
        <div class="signup">
            <img src="images/icons/login.png">
            <p><a href="register.php">Don't have an account yet? Sign up here!</a></p>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/recovery.js"></script>
    </body>
</html>