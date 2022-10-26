<?php
if(isset($_POST['register-submit'])){
    require_once("../../classes/db/update.classes.php");
    require_once("../../classes/services/register.classes.php");
    $RegisterService=new RegisterService();
    $RegisterService->register();
}
?>