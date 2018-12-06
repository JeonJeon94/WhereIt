<?php
include './dbconfig.php';
session_start();


$useremail=escape_string($_POST['user-email']);
$password=escape_string($_POST['password']); 

$member = sql_one("SELECT * FROM users WHERE user_email='$useremail' and password=PASSWORD('$password')");


if($member){
  if($member[email_code] == ''){
  $_SESSION['user_id']=$member[id];
    if($member[reset_password] == ''){
      // login success
      php_redirect("./index.php");
    }else{
      // login failed
      // 비밀번호 찾기 링크가 이메일로 전송된 상태
      alert_back("이메일의 비밀번호 찾기를 확인해주세요.");
    }
  }else{
    // login failed
    // 회원가입후 이메일 인증 안한 상태
    alert_back("이메일 인증절차를 마무리해주세요.");
  }
}else{
  //login failed
  alert_back("이메일과 비밀번호를 다시 확인해주세요.");
}

?>
