<?php

unset($_COOKIE['username']);
unset($_COOKIE['userpass']);
unset($_SESSION["signin"]);

setcookie("username", "", time()-3600);
setcookie("userpass", "", time()-3600);
$_SESSION["signin"] = false;

session_destroy();
redirect();
