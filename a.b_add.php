<?php
include "dbconfig.php";

if(!empty($_GET['b_add_id'])){
  $b_id=$_GET['b_add_id'];

  sql_one("INSERT INTO blacklist SET black_id='$b_id', date=now()");
  php_redirect('./a.blacklist.php?m=ok');
}else{
  alert_back('블랙리스트에 추가할 아이디를 입력해주세요.');
}

?>