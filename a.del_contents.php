<?php
  include "dbconfig.php";

  if(!empty($_GET['id'])){
    $Ids=$_GET['id'];
    
    $sql = sql_one("SELECT * FROM contents WHERE id in ($Ids)");
    $del_id = sql_query("DELETE FROM contents WHERE id in ($Ids)");

    $sub = explode(',', $sql[sub]);

    unlink($sql[main]);
    for($i=1; $i<count($sub); $i++){ unlink($sub[$i]); }
    php_redirect('./a.contents.php');
  }else{
    alert_back('삭제할 컨텐츠를 선택해주세요.');
  }
?>