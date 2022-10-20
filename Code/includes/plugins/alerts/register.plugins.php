<?php
// INPUT EMPTY
if(isset($_SESSION['register']['empty'])){
    print "<p><label style=\"color:red;\" for=\"register-username\">input empty</label></p>";
    unset($_SESSION['register']);
}
// VALIDATE USERNAME
if(isset($_SESSION['register']['username'])){
    print "<p><label style=\"color:red;\" for=\"register-username\">username validate error</label></p>";
    unset($_SESSION['register']);
}
// VALIDATE EMAIL
if(isset($_SESSION['register']['email'])){
    print "<p><label style=\"color:red;\" for=\"register-username\">email validate error</label></p>";
    unset($_SESSION['register']);
}
// STMT
if(isset($_SESSION['register']['stmt'])){
    print "<p><label style=\"color:red;\" for=\"register-username\">stmt error</label></p>";
    unset($_SESSION['register']);
}
?>