<?php
  include "dbconfig.php";

  if(!empty($_GET['id'])){
    $Ids=$_GET['id'];

    $del_id = sql_query("DELETE FROM contents WHERE id in ($Ids)");
    php_redirect('./a.contents.php');
  }else{
    alert_back('삭제할 컨텐츠를 선택해주세요.');
  }
?>