<?php
if(isset($_SESSION['home'])){
    switch($_SESSION['home']){
        case "empty":
            print "<span style=\"color:red;font-size:30px;\">some fields are empty</span>";
            unset($_SESSION['home']);
            break;
        case "email":
            print "<span style=\"color:red;font-size:30px;\">email is incorrect</span>";
            unset($_SESSION['home']);
            break;
        case "username":
            print "<span style=\"color:red;font-size:30px;\">username is incorrect</span>";
            unset($_SESSION['home']);
            break;
        case "password":
            print "<span style=\"color:red;font-size:30px;\">password is incorrect</span>";
            unset($_SESSION['home']);
            break;
        case "stmt":
            print "<span style=\"color:red;font-size:30px;\">stmt error</span>";
            unset($_SESSION['home']);
            break;
        default:
            break;
    }
}
?>