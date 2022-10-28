<?php
if(empty($_COOKIE['LOGIN'])){
    session_unset();
    header("location: ./login");
    session_start();
    $_SESSION['login']="stmt";
    exit();
}
?>