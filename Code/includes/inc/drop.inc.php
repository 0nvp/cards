<?php
if(isset($_POST['drop-submit'])){
    session_start();
    require_once("../db.classes.php");
    require_once("../classes/drop.classes.php");
    $RemoveService=new RemoveService();
    $RemoveService->remove();
}
?>