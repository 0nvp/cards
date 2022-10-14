<?php
if(isset($_POST['register-submit'])){
    require_once("../db.classes.php");
    require_once("../classes/register.classes.php");
    $RegisterService=new RegisterService();
    $RegisterService->register();
}
?>