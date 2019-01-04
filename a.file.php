<?php
  include "dbconfig.php";

  $num = $_POST['num'];
  $url = addslashes($_POST['title'.$num]);
  $file_name = $_FILES['upload'.$num]['name'];
  
  if(!empty($_FILES['upload'.$num]['name'])){
    //파일 업로드
    $file_name = $_FILES['upload'.$num]['name'];
    $file_tmp_name = $_FILES['upload'.$num]['tmp_name'];   // 임시 디렉토리에 저장된 파일명
    $file_size = $_FILES['upload'.$num]['size'];                 // 업로드한 파일의 크기
    $mimeType = $_FILES['upload'.$num]['type'];                 // 업로드한 파일의 MIME Type

    // 첨부 파일이 저장될 서버 디렉토리 지정(원하는 경로에 맞게 수정하세요)
    $save_dir = "./images/main_banner/web/";
  
    // 업로드 파일 확장자 검사 (필요시 확장자 추가)
    if($mimeType!="image/png" && $mimeType!="image/jpeg" && $mimeType!="image/jpg" && $mimeType!="image/gif") { 
      // alert_back('메인 이미지는 png,jpg,gif 파일만 업로드 가능합니다'); 
      // exit;
      echo "type error";
    } 
  
    // 파일명 변경 (업로드되는 파일명을 별도로 생성하고 원래 파일명을 별도의 변수에 지정하여 DB에 기록할 수 있습니다.)
      $real_name = $file_name;     // 원래 파일명(업로드 하기 전 실제 파일명) 
      $arr = explode(".", $real_name);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe	
      $cnt = count($arr)-1;
      $file_exe = $arr[$cnt]; //파일 확장자 지정
  
      $real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
      $real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
  
    $dest_url = $save_dir . $file_name;
    if(!move_uploaded_file($file_tmp_name, $dest_url)){
      die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
    }

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
  }else{
    alert_back("대표이미지를 첨부해주세요.");
  }
?>