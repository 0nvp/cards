<?php
print "<h1>Card game by The Asdeki Team</h1><hr><!--PERSONAL DATA--><div class=\"personal\">";
// USERNAME
print "Username: {$_SESSION['data']['username']} <span id=\"usernameSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reUsername()\">edit</span>
</div>";
// EMAIL
print "<div id=\"email\">Email: {$_SESSION['data']['email']} <span id=\"emailSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"reEmail()\">edit</span>
</div>";
// PASSWORD
print "<div id=\"password\">Password: ******** <span id=\"passwordSpan\" style=\"color:blue;cursor:pointer;\" onclick=\"rePassword()\">edit</span>
</div>";
// REMOVE
print "<div id=\"drop\"><span id=\"delAcc\" style=\"color:blue;cursor:pointer;\" onclick=\"confirmDelAcc()\">Delete account</span></div></div></div>";
?>