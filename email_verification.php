<?php 
  include 'dbconfig.php';

  $arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

  $login_email=$_GET['code'];

  $email_search = sql_one("SELECT id FROM users WHERE email_code = '$login_email'");

  if($email_search){
    $true = '';
    sql_query("UPDATE users SET email_code='$true' WHERE id='$email_search[id]'");
    
    for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
      if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) == true){
      // 모바일 브라우저라면  모바일 URL로 이동 
        header("Location: ./m.index.php");
        exit;
      }else{
      header("Location: ./index.php");
      }
    }
  }else{
    alert_back("잘못된 접근입니다!");
  }
?>