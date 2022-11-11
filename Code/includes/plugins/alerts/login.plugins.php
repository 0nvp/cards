<?php
if(isset($_SESSION['login'])){
    switch($_SESSION['login']){
        case "emptyEmail":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email field is empty.</span>";
            unset($_SESSION['login']);
            break;
        case "emptyPassword":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password field is empty.</span>";
            unset($_SESSION['login']);
            break;
        case "emptyId":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">recovery link does not exist.</span>";
            unset($_SESSION['login']);
            break;
        case "email":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email is incorrect.</span>";
            unset($_SESSION['login']);
            break;
        case "password":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password is incorrect.</span>";
            unset($_SESSION['login']);
            break;
        case "stmt":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">stmt error.</span>";
            unset($_SESSION['login']);
            break;
        case "account":
            print "<span style=\"color:green;background-color:#063e42;font-size:30px;\">successfully registered.</span>";
            unset($_SESSION['login']);
            break;
        case "update":
            print "<span style=\"color:green;background-color:#063e42;font-size:30px;\">successfully updated.</span>";
            unset($_SESSION['login']);
            break;
        case "reset":
            print "<span style=\"color:green;background-color:#063e42;font-size:30px;\">successfully updated.</span>";
            unset($_SESSION['login']);
            break;
        case "drop":
            print "<span style=\"color:green;background-color:#063e42;font-size:30px;\">we are soory to say goodbye to You.</span>";
            unset($_SESSION['login']);
            break;
        default:
            break;
    }
}
?>