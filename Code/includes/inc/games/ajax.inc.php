<!DOCTYPE HTML>
<?php
// TO FIX
if(isset($_POST['ajax']) && $_POST['ajax']=="nextRound" && count($_SESSION['computer']['array'])>0 && count($_SESSION['player']['array'])>0){
    require_once("includes/classes/games/ajax.classes.php");
    $_SESSION['game']['i']=1;
    // wywolac pozniej
    $AjaxService=new AjaxService();
    $AjaxService->nextRound();
}
if(isset($_POST['ajax']) && $_POST['ajax']=="test" && count($_SESSION['computer']['array'])>0 && count($_SESSION['player']['array'])>0){
    require_once("includes/classes/games/ajax2.classes.php");
    $AjaxService2=new AjaxService2();
    $AjaxService2->test();
}
?>