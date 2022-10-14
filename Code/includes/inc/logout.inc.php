<?php
session_start();
session_unset();
session_destroy();
setcookie("LOGIN", "", time() - 3600, "/");

header("location: ../../index.php");
?>