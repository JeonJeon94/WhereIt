<?php
  include "dbconfig.php";

  $sql = sql_one("SELECT id FROM rank ORDER BY id DESC");
  $last = $sql[id];

  if(!empty($_GET['num'])){
    $num = $_GET['num'];
    if(!empty($_GET['theme_title'.$num])&& !empty($_GET['theme_tag'.$num])){
      $theme = $_GET['theme_title'.$num];
      $tag = $_GET['theme_tag'.$num];

      if($num <= $last){
        sql_query("UPDATE rank SET theme='$theme', tag='$tag' WHERE id = '$num'");
        
        history_back();
      }else{
        sql_one("INSERT INTO rank SET theme='$theme', tag='$tag', id='$num'");
        history_back();
      }
    }else{
      history_back();
    }
  }else{
    history_back();
  };

?>