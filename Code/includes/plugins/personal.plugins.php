<?php
print "<form action=\"includes/inc/personal.inc.php\" method=\"POST\">
    <label for=\"email-email\"><b>Email</b></label>
    <input type=\"text\" name=\"email-email\" value=\"{$_SESSION['player']['email']}\" required=\"\">
    <input type=\"submit\" name=\"email-submit\" value=\"save\">
</form>
<form action=\"includes/inc/personal.inc.php\" method=\"POST\">
    <label for=\"username-username\"><b>Username</b></label>
    <input type=\"text\" name=\"username-username\" value=\"{$_SESSION['player']['username']}\" required=\"\">
    <input type=\"submit\" name=\"username-submit\" value=\"save\">
</form>";
?>