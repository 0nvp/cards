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
        case "emailPolity":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email is incorrect.</span>";
            unset($_SESSION['login']);
            break;
        case "passwordPolity":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password is incorrect.</span>";
            unset($_SESSION['login']);
            break;
        case "stmt":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">some errors occurred.</span>";
            unset($_SESSION['login']);
            break;
        case "cookie":
            print "<span style=\"color:red;background-color:#063e42;font-size:20px;\">the session was unexpectedly closed.</span>";
            unset($_SESSION['login']);
            break;
        case "register":
            print "<span style=\"color:green;background-color:#063e42;font-size:20px;\">account was successfully registered.</span>";
            unset($_SESSION['login']);
            break;
        case "passwordUpdate":
            print "<span style=\"color:green;background-color:#063e42;font-size:20px;\">password has been successfully updated.</span>";
            unset($_SESSION['login']);
            break;
        case "reset":
            print "<span style=\"color:green;background-color:#063e42;font-size:20px;\">password has been successfully updated.</span>";
            unset($_SESSION['login']);
            break;
        case "drop":
            print "<span style=\"color:green;background-color:#063e42;font-size:20px;\">we are soory, to say goodbye to You.</span>";
            unset($_SESSION['login']);
            break;
        default:
            break;
    }
}
?>