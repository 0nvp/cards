<?php
// USERNAME
print "<!--USERNAME--><div id=\"username\">
Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reUsername()\">edit</span>
</div>";
// EMAIL
print "<!--EMAIL--><div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span>
</div>";
// PASSWORD
print "<!--PASSWORD--><div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span>
</div>";
// REMOVE
print "<!--REMOVE ACCOUNT--><div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"confirmDelAcc()\">Delete account</span>
</div>";
?>