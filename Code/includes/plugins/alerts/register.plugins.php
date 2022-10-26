<?php
if(isset($_SESSION['register'])){
    switch($_SESSION['register']){
        case "empty":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">some fields are empty</span>";
            unset($_SESSION['register']);
            break;
        case "email":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email is incorrect</span>";
            unset($_SESSION['register']);
            break;
        case "username":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">username is incorrect</span>";
            unset($_SESSION['register']);
            break;
        case "stmt":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">stmt error</span>";
            unset($_SESSION['register']);
            break;
        default:
            break;
    }
}
?>