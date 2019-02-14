<?php
  include "dbconfig.php";

  $sql = sql_one("SELECT id FROM rank WHERE id<99 ORDER BY id DESC");

  $last = $sql[id];
  $r1 = $_GET['ranking1'];
  $r2 = $_GET['ranking2'];
  $r3 = $_GET['ranking3'];
  $r4 = $_GET['ranking4'];
  $r5 = $_GET['ranking5'];
  $r6 = $_GET['ranking6'];
  $r7 = $_GET['ranking7'];
  $r8 = $_GET['ranking8'];
  $r9 = $_GET['ranking9'];
  $r10 = $_GET['ranking10'];

  if(!empty($_GET['num'])){
    $num = $_GET['num'];
    if($num==99){
      if(!empty($r1)&&!empty($r2)&&!empty($r3)&&!empty($r4)&&!empty($r5)&&!empty($r6)&&!empty($r7)&&!empty($r8)&&!empty($r9)&&!empty($r10)){
        sql_query("UPDATE rank SET r1 = '$r1',r2 = '$r2',r3 = '$r3',r4 = '$r4',r5 = '$r5',r6 = '$r6',r7 = '$r7',r8 = '$r8',r9 = '$r9',r10 = '$r10' WHERE id =100 ");
        history_back();
      }else{
        alert_back('업체명을 모두 입력해주세요!');
      }
    }else if($num == 100){
      if(!empty($r1)&&!empty($r2)&&!empty($r3)&&!empty($r4)&&!empty($r5)&&!empty($r6)&&!empty($r7)&&!empty($r8)&&!empty($r9)&&!empty($r10)){
        sql_query("UPDATE rank SET r1 = '$r1',r2 = '$r2',r3 = '$r3',r4 = '$r4',r5 = '$r5',r6 = '$r6',r7 = '$r7',r8 = '$r8',r9 = '$r9',r10 = '$r10' WHERE id =100 ");
        history_back();
      }else{
        alert_back('업체명을 모두 입력해주세요!');
      }
    }else{
      if(!empty($_GET['theme_title'.$num])&& !empty($_GET['theme_tag'.$num])){
        $theme = $_GET['theme_title'.$num];
        $tag = $_GET['theme_tag'.$num];
  
        if($num <= $last){
          sql_query("UPDATE rank SET theme='$theme', tag='$tag',r1 = '$r1',r2 = '$r2',r3 = '$r3',r4 = '$r4',r5 = '$r5',r6 = '$r6',r7 = '$r7',r8 = '$r8',r9 = '$r9',r10 = '$r10' WHERE id = '$num'");
          history_back();
        }else{
          sql_one("INSERT INTO rank SET theme='$theme', tag='$tag',r1 = '$r1',r2 = '$r2',r3 = '$r3',r4 = '$r4',r5 = '$r5',r6 = '$r6',r7 = '$r7',r8 = '$r8',r9 = '$r9',r10 = '$r10', id='$num'");
          history_back();
        }
      }else{
        history_back();
      }
    }
  }else{
    history_back();
  };

?>