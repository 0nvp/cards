<?php
session_start();
if(empty($_GET['id-recovery'])){
    header("location: index.php");
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
        <div class="alert" style="z-index:1;position:fixed;margin:32% 22%;font-size:30px;font-weight:bold;">
            <?php if(isset($_COOKIE['alert'])){print $_COOKIE['alert'];setcookie("alert", "", time() - 10, "/");}?>
        </div>
        <!--FORM-->
        <div class="login">
            <h1>New password</h1>
            <form method="POST" action="includes/inc/recovery.inc.php?<?php print "id-recovery={$_GET['id-recovery']}";?>">
            <label for="reset-password"><img src="images/icons/password.png" width="30px" height="24px" alt="icon"></label>
                <input id="password" type="password" name="reset-password" placeholder="password" required=""><br>
                <input type="submit" name="reset-submit" value="Reset password">
            </form>
        </div>
        <div class="signup">
            <img src="images/icons/login.png">
            <p><a href="index.php">Back to login page</a></p>
        </div>
    </body>
</html>