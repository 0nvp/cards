function recoveryPassword(){
    document.getElementById("signin").innerHTML="<h1>Reset password</h1><h4>The Asdeki Team</h4><form method=\"POST\" action=\"includes/inc/services/recovery.inc.php\"><input type=\"text\" name=\"recovery-email\" placeholder=\"Email\" required=\"\" autocomplete=\"off\"><input type=\"submit\" name=\"recovery-submit\" value=\"Reset password\"></form>";
}