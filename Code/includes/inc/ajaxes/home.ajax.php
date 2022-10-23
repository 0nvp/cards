<?php
if(empty($_POST['sidenav'])){
    header("location: ../../../index.php");
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="home"){
    header("location: ../../../home.php");
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="profile"){
    header("location: ../../../profile.php");
    exit();
}
if(isset($_POST['sidenav']) && $_POST['sidenav']=="ranking"){
    header("location: ../../../ranking.php");
    exit();
}