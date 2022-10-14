<!DOCTYPE HTML>
<?php
if(isset($_POST['ajax'])){
    require_once("includes/inc/card.inc.php");
    require_once("includes/classes/ajax.classes.php");
    $AjaxService=new AjaxService();
    $AjaxService->nextRound();
}
?>