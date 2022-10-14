<?php
if(isset($_POST['recovery-submit'])){
    require_once("../db.classes.php");
    require_once("../classes/recovery.classes.php");
    $RecoveryService=new RecoveryService();
    $RecoveryService->recovery();
}
if(isset($_POST['reset-submit'])){
    require_once("../db.classes.php");
    require_once("../classes/reset.classes.php");
    $ResetService=new ResetService();
    $ResetService->reset();
}
?>