<?php
if(isset($_SESSION['login'])){
    switch($_SESSION['login']){
        case "empty":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">some fields are empty</span>";
            unset($_SESSION['login']);
            break;
        case "email":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email is incorrect</span>";
            unset($_SESSION['login']);
            break;
        case "stmt":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">stmt error</span>";
            unset($_SESSION['login']);
            break;
        default:
            break;
    }
}
?>