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
        <!--CONTEINER-->
        <div class="conteiner">
            <!--ERROR MSG-->
            <div id="alert">
                <?php require_once("includes/plugins/alerts/login.plugins.php");?>
            </div>
            <!--LOG IN-->
            <div id="signin">
                <?php require_once("includes/plugins/services/login.plugins.php");?>
            </div>
            <!--SIGN UP-->
            <a id="signup" href="./sign-up">Don't have an account yet? Sign up here!</a>
            <!--COPYRIGHT-->
            <span id="author">Copyright 2022 by The Asdeki Team. All Rights Reserved.<br>Webiste is Powered by 0nvp</span>
        </div>
        <!--JAVA SCRIPT-->
        <script src="js/recovery.js"></script>
    </body>
</html>