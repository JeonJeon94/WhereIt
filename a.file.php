<?php
  include "dbconfig.php";

  // $url = $_POST['title'];
  // if(!empty($_FILES['upload']['name'])){
  //   $file_name = $_FILES['upload']['name'];
    
  //   $uploaddir ="./images/main_banner/web";
  //   $splits = explode('.', $file_name);
  //   $len = count($splits);
  //   $ext = $splits[$len-1];
  //   if($ext!="png" && $ext!="jpeg" && $ext!="jpg" && $ext!="gif") { 
  //     echo("<script> 
  //         alert('png,jpg,gif 파일만 업로드 가능합니다'); 
  //         history.back();  
  //       </script>"); 
  //     exit;
  //   } 
  //   alert($_FILES['upload']['tmp_name']."$uploaddir/$file_name");
  //   move_uploaded_file($_FILES['upload']['tmp_name'], "$uploaddir/$file_name");
  // }

  $file_name = $_FILES['upload']['name'];                // 업로드한 파일명

  if(!empty($_FILES['upload']['name'])){
    //파일 업로드
    $file_tmp_name = $_FILES['upload']['tmp_name'];   // 임시 디렉토리에 저장된 파일명
    $file_size = $_FILES['upload']['size'];                 // 업로드한 파일의 크기
    $mimeType = $_FILES['upload']['type'];                 // 업로드한 파일의 MIME Type
  
    // 첨부 파일이 저장될 서버 디렉토리 지정(원하는 경로에 맞게 수정하세요)
    $save_dir = './images/main_banner/web/';
  
    // 업로드 파일 확장자 검사 (필요시 확장자 추가)
    // if($mimeType!="image/png" && $mimeType!="image/jpeg" && $mimeType!="image/jpg" && $mimeType!="image/gif") { 
    //   echo("<script> 
    //       alert('png,jpg,gif 파일만 업로드 가능합니다'); 
    //       history.back();  
    //     </script>"); 
    //   exit;
    // } 
  
    // 파일명 변경 (업로드되는 파일명을 별도로 생성하고 원래 파일명을 별도의 변수에 지정하여 DB에 기록할 수 있습니다.)
      $real_name = $file_name;     // 원래 파일명(업로드 하기 전 실제 파일명) 
      $arr = explode(".", $real_name);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe	
      $cnt = count($arr)-1;
      $file_exe = $arr[$cnt]; //파일 확장자 지정
  
      $file_time = time(); 
      $file_Name = $studentId.".".strtolower($file_exe);	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)	 
      $change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
      $real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
      $real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
  
    //파일을 저장할 디렉토리 및 파일명 전체 경로
    $dest_url = $save_dir . $change_file_name;
  
    //파일을 지정한 디렉토리에 업로드
    if(!move_uploaded_file($file_tmp_name, $dest_url))
    {
      die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
    }
  }else{
    $dest_url = $_POST['upload-text'];
  }
  

?>