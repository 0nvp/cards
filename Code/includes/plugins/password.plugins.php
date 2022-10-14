<?php
print "<form action=\"includes/inc/password.inc.php\" method=\"POST\">
    <label for=\"password-password1\"><b>Old password</b></label>
    <input type=\"password\" name=\"password-password1\" placeholder=\"old password\" required=\"\">
    <label for=\"password-password2\"><b>New password</b></label>
    <input type=\"password\" name=\"password-password2\" placeholder=\"old password\" required=\"\">
    <input type=\"submit\" name=\"password-submit\" value=\"change password\">
</form>";
?>