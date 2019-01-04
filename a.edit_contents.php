<?php
include "dbconfig.php";

$id = $_POST['num'];

$back = sql_one("SELECT * FROM contents WHERE id='$id'");
$sub_c = explode('./contents/sub/', $back[sub]);  

$main_i = explode(',', $back[main]);
$sub_i = explode(',', $back[sub]);

unlink($main_i[0]);
for($i=0; $i<count($sub_c); $i++){ unlink($sub_i[$i]); }

$title = addslashes($_POST['edit_title']);
$text = addslashes($_POST['edit_text']);
$main = $_FILES['edit_main']['name'];
$count = count($_FILES['edit_sub']['name']);


          

if(!empty($_FILES['edit_sub']['name'])){
  //파일 업로드
  if(!empty($_FILES['edit_main']['name'])){
    //파일 업로드
    $m_file_name = $_FILES['edit_main']['name'];
    $m_file_tmp_name = $_FILES['edit_main']['tmp_name'];   // 임시 디렉토리에 저장된 파일명
    $m_file_size = $_FILES['edit_main']['size'];                 // 업로드한 파일의 크기
    $m_mimeType = $_FILES['edit_main']['type'];                 // 업로드한 파일의 MIME Type
  
    // 첨부 파일이 저장될 서버 디렉토리 지정(원하는 경로에 맞게 수정하세요)
    $m_save_dir = './contents/main/';
  
    // 업로드 파일 확장자 검사 (필요시 확장자 추가)
    if($m_mimeType!="image/png" && $m_mimeType!="image/jpeg" && $m_mimeType!="image/jpg" && $m_mimeType!="image/gif") { 
      alert_back('메인 이미지는 png,jpg,gif 파일만 업로드 가능합니다'); 
      exit;
    } 
  
    // 파일명 변경 (업로드되는 파일명을 별도로 생성하고 원래 파일명을 별도의 변수에 지정하여 DB에 기록할 수 있습니다.)
      $m_real_name = $m_file_name;     // 원래 파일명(업로드 하기 전 실제 파일명) 
      $m_arr = explode(".", $m_real_name);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe	
      $m_cnt = count($m_arr)-1;
      $m_file_exe = $m_arr[$m_cnt]; //파일 확장자 지정
  
      $m_real_name = addslashes($m_real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
      $m_real_size = $m_file_size;                         // 업로드 되는 파일 크기 (byte)
  
    $m_dest_url = $m_save_dir . $m_file_name;
    if(!move_uploaded_file($m_file_tmp_name, $m_dest_url)){
      die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
    }
  }else{
    alert_back('대표이미지를 첨부해주세요.');
  }
  for($i=0; $i<$count; $i++){
    $file_name[$i] = $_FILES['edit_sub']['name'][$i];
    $file_tmp_name[$i] = $_FILES['edit_sub']['tmp_name'][$i];   // 임시 디렉토리에 저장된 파일명
    $file_size[$i] = $_FILES['edit_sub']['size'][$i];                 // 업로드한 파일의 크기
    $mimeType[$i] = $_FILES['edit_sub']['type'][$i];                 // 업로드한 파일의 MIME Type
  
    // 첨부 파일이 저장될 서버 디렉토리 지정(원하는 경로에 맞게 수정하세요)
    $save_dir = './contents/sub/';

    //업로드 파일 확장자 검사 (필요시 확장자 추가)
    
    if($mimeType[$i]!="image/png" && $mimeType[$i]!="image/jpeg" && $mimeType[$i]!="image/jpg" && $mimeType[$i]!="image/gif") { 
      
      alert_back('이미지 추가는 png,jpg,gif 파일만 업로드 가능합니다'); 
      exit;
    } 

    // 파일명 변경 (업로드되는 파일명을 별도로 생성하고 원래 파일명을 별도의 변수에 지정하여 DB에 기록할 수 있습니다.)
      $real_name[$i] = $file_name[$i];     // 원래 파일명(업로드 하기 전 실제 파일명) 
      $arr[$i] = explode(".", $real_name[$i]);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe	
      $cnt[$i] = count($arr[$i])-1;
      $file_exe[$i] = $arr[$i][$cnt[$i]]; //파일 확장자 지정

      $real_name[$i] = addslashes($real_name[$i]);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
      $real_size[$i] = $file_size[$i];                         // 업로드 되는 파일 크기 (byte)

    //파일을 저장할 디렉토리 및 파일명 전체 경로
    $dest_url[$i] = $save_dir . $file_name[$i];

    //파일을 지정한 디렉토리에 업로드
    if(!move_uploaded_file($file_tmp_name[$i], $dest_url[$i])){
      die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
    }

    $m_link = "./contents/main/".$m_file_name;
      $link = "./contents/sub/".$file_name[$i];
    if($count==1){
      $link_a = "./contents/sub/".$file_name[$i];
    }else{
      $link_a = $link_a.','.$link;
    }
  }
  sql_query("UPDATE contents SET title='$title', text='$text', main='$m_link', sub='$link_a' WHERE id='$id' ");
  php_redirect('./a.contents.php');
}


?>