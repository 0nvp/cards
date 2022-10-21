<?php
// INPUT EMPTY
if(isset($_SESSION['register']['empty'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">some fields are empty</span>";
    unset($_SESSION['register']);
}
// VALIDATE USERNAME
if(isset($_SESSION['register']['username'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">username is incorrect</span>";
    unset($_SESSION['register']);
}
// VALIDATE EMAIL
if(isset($_SESSION['register']['email'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">email is incorrect</span>";
    unset($_SESSION['register']);
}
// STMT
if(isset($_SESSION['register']['stmt'])){
    print "<span style=\"color:red;background-color:rgb(11, 38, 119);font-size:30px;\">stmt error</span>";
    unset($_SESSION['register']);
}
?>