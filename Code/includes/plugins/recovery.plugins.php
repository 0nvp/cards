<?php
print "<h1>Reset password</h1>
<form method=\"POST\" action=\"includes/inc/recovery.inc.php\">
    <label for=\"recovery-email\"><img src=\"images/icons/email.png\" width=\"30px\" height=\"24px\" alt=\"icon\"></label>
    <input type=\"text\" name=\"recovery-email\" placeholder=\"email\" required=\"\"><br>
    <input type=\"submit\" name=\"recovery-submit\" value=\"Reset your password\">
</form>";
?>