<?php
  include "dbconfig.php";

  if(!empty($_POST['num'])){
    $num = $_POST['num'];

    if(!empty($_POST['title'.$num]) && !empty($_FILES['upload'.$num]['name'])){
      $url = $_POST['title'.$num];
      $file_name = $_FILES['upload'.$num]['name'];


      $uploaddir ="./images/main_banner/web";
      $splits = explode('.', $file_name);
      $len = count($splits);
      $ext = $splits[$len-1];
      if($ext!="png" && $ext!="jpeg" && $ext!="jpg" && $ext!="gif") { 
        alert_back('png,jpg,gif 파일만 업로드 가능합니다'); 
        exit;
      } 
      move_uploaded_file($_FILES['upload'.$num]['tmp_name'], "$uploaddir/$file_name");

      $last = sql_one("SELECT id FROM banner_file ORDER BY id DESC");
      $last_num = $last[id];

      $link = "./images/main_banner/web/".$file_name;
      
      if($num <= $last_num ){
        sql_query("UPDATE banner_file SET url='$url', banner_file='$link' where id='$num' ");
        php_redirect('./a.banner_file.php');
      }else{
        sql_query("INSERT INTO banner_file SET url='$url', banner_file='$link', id='$num' ");
        php_redirect('./a.banner_file.php');
      }
    }
  }else{
    alert_back("잘못된 접근입니다.");
  }

?>