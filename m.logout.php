<?php
include './dbconfig.php';

session_destroy();

php_redirect("m.index.php");
?>