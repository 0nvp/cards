<?php
if(isset($_POST['drop-submit'])){
    session_start();
    require_once("../../classes/db/update.classes.php");
    require_once("../../classes/settings/drop.classes.php");
    $RemoveService=new RemoveService();
    $RemoveService->remove();
}
?>