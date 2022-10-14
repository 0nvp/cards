<?php
if(isset($_POST['email-submit'])){
    session_start();
    require_once("../db.classes.php");
    require_once("../classes/email.classes.php");
    $EmailService=new EmailService();
    $EmailService->email();
}
if(isset($_POST['username-submit'])){
    session_start();
    require_once("../db.classes.php");
    require_once("../classes/username.classes.php");
    $UsernameService=new UsernameService();
    $UsernameService->username();
}
?>