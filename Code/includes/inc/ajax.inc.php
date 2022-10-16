<!DOCTYPE HTML>
<?php
if(isset($_POST['ajax']) && $_POST['ajax']=="nextRound" && count($_SESSION['computer']['array'])>0 && count($_SESSION['player']['array'])>0){
    require_once("includes/classes/games/ajax.classes.php");
    $AjaxService=new AjaxService();
    $AjaxService->nextRound();
}
if(isset($_POST['ajax']) && $_POST['ajax']=="test" && count($_SESSION['computer']['array'])>0 && count($_SESSION['player']['array'])>0){
    require_once("includes/classes/games/ajax.classes.php");
    $AjaxService=new AjaxService();
    $AjaxService->test();
}
?>