<?php
if(empty($_COOKIE['LOGIN'])){
    session_unset();
    header("location: index.php");
    session_start();
    $_SESSION['login']="stmt";
    exit();
}
?>