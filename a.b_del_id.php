<?php
  include "dbconfig.php";

  if(!empty($_GET['id'])){
    $Ids=$_GET['id'];

    $del_id = sql_query("DELETE FROM blacklist WHERE id in ($Ids)");
    php_redirect('./a.blacklist.php');
  }else{
    alert_back('삭제할 아이디를 선택해주세요.');
  }
?>