<?php
session_start();
// RECOVERY SESSION
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
        <!--RESET PASSWORD-->
        <div class="login">
            <h1>New password</h1>
            <form method="POST" action="includes/inc/services/recovery.inc.php?<?php print "id-recovery={$_GET['id-recovery']}";?>">
            <?php if(isset($_SESSION['reset']['empty'])){print "<label style=\"color:red;\" for=\"reset-password\">input empty</label><br>";session_destroy();}?>
            <label for="reset-password"><img src="images/icons/password.png" width="30px" height="24px" alt="icon"></label>
                <input id="password" type="password" name="reset-password" placeholder="password" required=""><br>
                <?php if(isset($_SESSION['reset']['stmt'])){print "<label style=\"color:red;\" for=\"reset-submit\">stmt failed</label><br>";session_destroy();}?>
                <input type="submit" name="reset-submit" value="Reset password">
            </form>
        </div>
        <!--LOGIN PAGE-->
        <div class="signup">
            <img src="images/icons/login.png">
            <p><a href="index.php">Back to login page</a></p>
        </div>
    </body>
</html>