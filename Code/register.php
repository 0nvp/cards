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
            <h1>Sign up</h1>
            <h4>The Asdeki Team</h4>
            <form method="POST" action="includes/inc/services/register.inc.php">
                <input type="text" name="register-username" placeholder="Username *" required="" autocomplete="off">
                <input type="text" name="register-email" placeholder="Email *" required="" autocomplete="off">
                <input type="password" name="register-password" placeholder="Password *" required="" autocomplete="off">
                <input type="submit" name="register-submit" value="Sign up">
            </form>
            <!--SIGN IN-->
            <p id="signin">Already have an account? <a href="index.php">Sign in</a></p>
        </div>
    </body>
</html>