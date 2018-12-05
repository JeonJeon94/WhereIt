<?php 
  include 'dbconfig.php';

  $arr_browser = array ("iPhone","iPod","IEMobile","Mobile","lgtelecom","PPC");

  $edit_pw=$_GET['code'];

  $pw_search = sql_one("SELECT id FROM users WHERE reset_password = '$edit_pw'");

  if($pw_search){
    $true = '';
    sql_query("UPDATE users SET
    reset_password='$true',
    password=''
    WHERE id='$pw_search[id]'");

    for($indexi = 0 ; $indexi < count($arr_browser) ; $indexi++) {
      if(strpos($_SERVER['HTTP_USER_AGENT'],$arr_browser[$indexi]) != false){
        // 모바일 브라우저라면  모바일 URL로 이동 
        header("Location: ./m.edit_pwform.php?id=$pw_search[id]");
        exit;
      } else {
        header("Location: ./edit_pwform.php?id=$pw_search[id]");
      }
    }
  }else{
    alert_back("잘못된 접근입니다!");
  }

?>