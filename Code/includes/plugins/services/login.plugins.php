<?php
if(empty($_GET['id-recovery'])){
    print "<h1>Sign in</h1>
    <h4>The Asdeki Team</h4>
    <form method=\"POST\" action=\"includes/inc/services/login.inc.php\">
        <input type=\"text\" name=\"login-email\" placeholder=\"Email\" required=\"\" autocomplete=\"off\">
        <input type=\"password\" name=\"login-password\" placeholder=\"Password\" required=\"\" autocomplete=\"off\">
        <span id=\"forgetpass\" onclick=\"recoveryPassword()\">Forget password?</span>
        <input type=\"submit\" name=\"login-submit\" value=\"Login\">
    </form>";
}
if(isset($_GET['id-recovery'])){
    print "<h1>New password</h1>
    <h4>The Asdeki Team</h4>
    <form method=\"POST\" action=\"includes/inc/services/recovery.inc.php?id-recovery={$_GET['id-recovery']}\">
        <input type=\"password\" name=\"reset-password\" placeholder=\"Password\" required=\"\" autocomplete=\"off\">
        <input type=\"submit\" name=\"reset-submit\" value=\"Reset\">
    </form>";
}