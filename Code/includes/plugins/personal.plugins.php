<?php
print "<!--USERNAME--><div id=\"username\">Username: {$_SESSION['player']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reUsername()\">edit</span>
</div>
<!--EMAIL-->
<div id=\"email\">Email: {$_SESSION['player']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span>
</div>
<!--PASSWORD-->
<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span>
</div>
<!--REMOVE ACCOUNT-->
<div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"delAcc()\">Delete account</span>
</div>";
?>