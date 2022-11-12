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
        <link rel="stylesheet" type="text/css" href="css/register.css">
    </head>
    <body>
        <div class="conteiner">
            <!--ERROR MSG-->
            <div id="alert">
                <?php require_once("includes/plugins/alerts/register.plugins.php");?>
            </div>
            <!--SIGN UP-->
            <div id="signup">
                <h1>Sign up</h1>
                <h4>Your account for everything.</h4>
                <form method="POST" action="includes/inc/services/register.inc.php">
                    <input type="text" name="register-username" placeholder="Username *" required="" autocomplete="off">
                    <input type="text" name="register-email" placeholder="Email *" required="" autocomplete="off">
                    <input type="password" name="register-password" placeholder="Password *" required="" autocomplete="off">
                    <input type="submit" name="register-submit" value="Sign up">
                </form>
            </div>
            <!--SIGN IN-->
            <a id="signin" href="./login">Already have an account? Sign in here!</a>
            <!--COPYRIGHT-->
            <span id="author">Copyright 2022 by The Asdeki Team. All Rights Reserved.<br>Webiste is Powered by 0nvp</span>
        </div>
    </body>
</html>