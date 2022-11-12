<?php
if(isset($_SESSION['register'])){
    switch($_SESSION['register']){
        case "emptyUsername":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">username field is empty.</span>";
            unset($_SESSION['register']);
            break;
        case "emptyEmail":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email field is empty.</span>";
            unset($_SESSION['register']);
            break;
        case "emptyPassword":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password field is empty.</span>";
            unset($_SESSION['register']);
            break;
        case "usernamePolity":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">username is incorrect.</span>";
            unset($_SESSION['register']);
            break;
        case "usernameUse":
            print "<span style=\"color:red;background-color:#063e42;font-size:20px;\">sorry, this username is not available.</span>";
            unset($_SESSION['register']);
            break;
        case "emailPolity":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email is incorrect.</span>";
            unset($_SESSION['register']);
            break;
        case "passwordPolity":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password is incorrect.</span>";
            unset($_SESSION['register']);
            break;
        case "stmt":
            print "<span style=\"color:red;background-color:#063e42;font-size:20px;\">register error, try again later.</span>";
            unset($_SESSION['register']);
            break;
        default:
            break;
    }
}
?>