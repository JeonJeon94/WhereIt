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
        echo("<script> 
            alert('png,jpg,gif 파일만 업로드 가능합니다'); 
            history.back();  
          </script>"); 
        exit;
      } 
      move_uploaded_file($_FILES['upload'.$num]['tmp_name'], "$uploaddir/$file_name");
      // $link = "./images/"
      // if()
      // sql_query('INSER ')
    }
  }else{

  }



?>