<?php
if(empty($_COOKIE['LOGIN'])){
    session_unset();
    header("location: index.php");
    setcookie("alert", "<span style=\"color:red;\">user not found</span>", time() + 5, "/");
    exit();
}
?>