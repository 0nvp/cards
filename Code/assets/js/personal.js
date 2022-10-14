function reUsername(){
    document.getElementById("username").innerHTML="<form action=\"includes/inc/personal.inc.php\" method=\"POST\"><input type=\"text\" name=\"username-username\" placeholder=\"new username\"required=\"\"> <input type=\"submit\" name=\"username-submit\" value=\"save\"></form>";
}
function reEmail(){
    document.getElementById("email").innerHTML="<form action=\"includes/inc/personal.inc.php\" method=\"POST\"><input type=\"text\" name=\"email-email\" placeholder=\"new email\"required=\"\"> <input type=\"submit\" name=\"email-submit\" value=\"save\"></form>";
}
function rePassword(){
    document.getElementById("password").innerHTML="<form action=\"includes/inc/password.inc.php\" method=\"POST\"><input type=\"password\" name=\"password-password1\" placeholder=\"old password\" required=\"\"> <input type=\"password\" name=\"password-password2\" placeholder=\"new password\" required=\"\"> <input type=\"submit\" name=\"password-submit\" value=\"change password\"></form>";
}
function confirmDelAcc(){
    if(confirm("Are you sure?")){
        delAcc();
    }
}
function delAcc(){
    document.getElementById("drop").innerHTML="<form action=\"includes/inc/drop.inc.php\" method=\"POST\"><input type=\"password\" name=\"drop-password\" placeholder=\"password\" required=\"\"> <input type=\"submit\" name=\"drop-submit\" value=\"remove account\"></form>";
}