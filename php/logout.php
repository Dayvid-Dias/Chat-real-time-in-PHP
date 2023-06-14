<?php
include("check.php");

unset($_COOKIE["ID"]);
setcookie("ID", "", time()-3600, '/');
unset($user);
?>