<?php
include './dbconfig.php';
session_start();

$useremail=escape_string($_POST['user-email']);
$password=escape_string($_POST['password']); 

$member = sql_one("SELECT * FROM users WHERE user_email='$useremail' and password=PASSWORD('$password')");
if($member){
  $_SESSION['user_id']=$member[id];

  php_redirect("m.index.php");
  // login success
}else {
  // login failed
  alert_back("아이디 혹은 패스워드가 다릅니다.");
}
?>
