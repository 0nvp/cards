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
        <div class="conteiner">
            <!--ERROR MSG-->
            <div id="alert">
                <?php require_once("includes/plugins/alerts/login.plugins.php");?>
            </div>
            <!--LOG IN-->
            <div id="signin" style="background-color:rgb(11, 38, 119);">
                <?php require_once("includes/plugins/services/login.plugins.php");?>
            </div>
            <!--SIGN UP-->
            <a id="signup" href="register.php">Don't have an account yet? Sign up here!</a>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/recovery.js"></script>
    </body>
</html>