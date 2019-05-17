<?php

unset($_SESSION["admin_username"]);
$_SESSION["admin_username"] = false;

redirect();
