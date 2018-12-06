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
      php_redirect("./m.index.php");
    }else{
      // login failed
      alert_back("이메일의 비밀번호 찾기를 확인해주세요.");
    }
  }else{
    // login failed
    alert_back("이메일 인증절차를 마무리해주세요.");
  }
}else {
  // login failed
  alert_back("아이디 혹은 패스워드가 다릅니다.");
}
?>
