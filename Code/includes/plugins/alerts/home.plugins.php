<?php
if(isset($_SESSION['home'])){
    switch($_SESSION['home']){
        case "emptyUsername":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">username field is empty.</span>";
            unset($_SESSION['home']);
            break;
        case "emptyEmail":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">email field is empty.</span>";
            unset($_SESSION['home']);
            break;
        case "emptyPassword":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">password field is empty.</span>";
            unset($_SESSION['home']);
            break;
        case "emailPolity":
            print "<span style=\"color:red;font-size:30px;\">email is incorrect.</span>";
            unset($_SESSION['home']);
            break;
        case "emailMatch":
            print "<span style=\"color:red;font-size:30px;\">new changes have not been saved.</span>";
            unset($_SESSION['home']);
            break;
        case "usernamePolity":
            print "<span style=\"color:red;font-size:30px;\">username is incorrect.</span>";
            unset($_SESSION['home']);
            break;
        case "usernameMatch":
            print "<span style=\"color:red;font-size:30px;\">new changes have not been saved.</span>";
            unset($_SESSION['home']);
            break;
        case "usernameUse":
            print "<span style=\"color:red;font-size:30px;\">sorry, this username is not available.</span>";
            unset($_SESSION['home']);
            break;
        case "passwordPolity":
            print "<span style=\"color:red;font-size:30px;\">password is incorrect.</span>";
            unset($_SESSION['home']);
            break;
        case "passwordMatch":
            print "<span style=\"color:red;font-size:30px;\">new changes have not been saved.</span>";
            unset($_SESSION['home']);
            break;
        case "stmt":
            print "<span style=\"color:red;font-size:30px;\">personal data error, try again later.</span>";
            unset($_SESSION['home']);
            break;
        case "saved":
            print "<span style=\"color:red;background-color:#063e42;font-size:30px;\">new changes have been saved.</span>";
            unset($_SESSION['home']);
            break;
        default:
            break;
    }
}
?>