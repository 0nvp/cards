<?php
// INPUT EMPTY
if(isset($_SESSION['login']['empty'])){
    print "<p><label style=\"color:red;\" for=\"login-email\">input empty</label></p>";
    unset($_SESSION['lgoin']);
}
// VALIDATE EMAIL
if(isset($_SESSION['login']['email'])){
    print "<p><label style=\"color:red;\" for=\"login-email\">email validate error</label></p>";
    unset($_SESSION['login']);
}
// STMT
if(isset($_SESSION['login']['stmt'])){
    print "<p><label style=\"color:red;\" for=\"login-email\">stmt error</label></p>";
    unset($_SESSION['login']);
}
?>