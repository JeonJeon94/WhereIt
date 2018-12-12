<?php
include './dbconfig.php';

if($_SESSION['admin_id']){
  $id = $_SESSION['admin_id'];
  $member = sql_one("SELECT * FROM ad WHERE id=$id");
  if(!$member){
    alert_back("로그인을 해주세요!");
  }
}else{
  php_redirect("./admin_login.php");
}
?>

<!doctype <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="./css/a_style.css?ver=1.1"  type="text/css" />
  <title>Page Title</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="default-page <?=$page?>-page">
  <div class="header">
    <a id="logout" href='./a.logout.php'>로그아웃</a>
  </div>