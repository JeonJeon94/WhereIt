<?php
include './dbconfig.php';

session_destroy();

php_redirect("./admin_login.php");

?>
