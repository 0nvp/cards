<?php
if(isset($_POST['password-submit'])){
    session_start();
    require_once("../../db.classes.php");
    require_once("../../classes/settings/password.classes.php");
    $PasswordService=new PasswordService();
    $PasswordService->password();
}
?>