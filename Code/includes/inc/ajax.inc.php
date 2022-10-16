<!DOCTYPE HTML>
<?php
if(isset($_POST['ajax']) && count($_SESSION['computer']['array'])>0 && count($_SESSION['player']['array'])>0){
    require_once("includes/classes/ajax.classes.php");
    $AjaxService=new AjaxService();
    $AjaxService->nextRound();
}
?>