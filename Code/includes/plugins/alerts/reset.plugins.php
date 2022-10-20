<?php
// EMPTY INPUT
if(isset($_SESSION['reset']['empty'])){
    print "<p><label style=\"color:red;\" for=\"reset-password\">input empty</label></p>";
    unset($_SESSION['reset']);
}
// STMT
if(isset($_SESSION['reset']['stmt'])){
    print "<p><label style=\"color:red;\" for=\"reset-password\">stmt error</label></p>";
    unset($_SESSION['reset']);
}
?>