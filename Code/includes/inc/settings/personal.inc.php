<?php
if(isset($_POST['email-submit'])){
    session_start();
    require_once("../../classes/db/update.classes.php");
    require_once("../../classes/settings/email.classes.php");
    $EmailService=new EmailService();
    $EmailService->email();
}
if(isset($_POST['username-submit'])){
    session_start();
    require_once("../../classes/db/update.classes.php");
    require_once("../../classes/settings/username.classes.php");
    $UsernameService=new UsernameService();
    $UsernameService->username();
}
?>