<?php
if(isset($_POST['sidenav']) && $_POST['sidenav']=="home"){
    require_once("includes/plugins/ajaxes/home/home.ajax.php");
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="profile"){
    require_once("includes/plugins/ajaxes/home/profile.ajax.php");
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="ranking"){
    require_once("includes/plugins/ajaxes/home/ranking.ajax.php");
    exit();
}
?>