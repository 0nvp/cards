<?php
// INPUT EMPTY
if(isset($_SESSION['login']['empty'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">some fields are empty</span>";
    unset($_SESSION['lgoin']);
}
// VALIDATE EMAIL
if(isset($_SESSION['login']['email'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">email is incorrect</span>";
    unset($_SESSION['login']);
}
// STMT
if(isset($_SESSION['login']['stmt'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">stmt error</span>";
    unset($_SESSION['login']);
}
?>