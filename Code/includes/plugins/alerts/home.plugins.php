<?php
// INPUT EMPTY
if(isset($_SESSION['home']['empty'])){
    print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">some fields are empty</span>";
    unset($_SESSION['home']);
}
// VALIDATE USERNAME
if(isset($_SESSION['home']['username'])){
    print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">username is incorrect</span>";
    unset($_SESSION['home']);
}
// VALIDATE EMAIL
if(isset($_SESSION['home']['email'])){
    print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email is incorrect</span>";
    unset($_SESSION['home']);
}
// VALIDATE PASSWORD
if(isset($_SESSION['home']['password'])){
    print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password is incorrect</span>";
    unset($_SESSION['home']);
}
// STMT
if(isset($_SESSION['home']['stmt'])){
    print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">stmt error</span>";
    unset($_SESSION['home']);
}
?>