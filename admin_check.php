<?php
include "dbconfig.php";

session_start();

$id = escape_string($_POST["admin_id"]);
$pw = escape_string($_POST["password"]);

$admin = sql_one("SELECT id FROM ad WHERE admin_id='$id' and password = PASSWORD('$pw')");


if($admin){
  $_SESSION['admin_id']=$admin[id];
  php_redirect("./admin.php");
}else{
  alert_back("관리자만 접근 가능합니다. 아이디와 비밀번호를 확인해주세요.");
}

?>