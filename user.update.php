<?php
$NEED_LOGIN=true;
include './head.php';

$user_id = $member[id];

$password=escape_string($_POST['password']);
$new_pw=escape_string($_POST['new_pw']);
$new_pw2=escape_string($_POST['new_pw2']);
$username=escape_string($_POST['username']); 

$member = sql_one("SELECT * FROM users WHERE id='$user_id' and password=PASSWORD('$password')");

$already_username = sql_one("SELECT * FROM users where user_name ='$username'");

if(mb_strlen($password,'UTF-8') != 0){
  if(mb_strlen($new_pw,'UTF-8') <8){
    alert_back("변경할 비밀번호를 8자리이상 입력해주세요.");
  }
  if(mb_strlen($new_pw2,'UTF-8') <8){
    alert_back("변경할 비밀번호를 8자리이상 입력해주세요.");
  }
  if($new_pw != $new_pw2){
    alert_back("변경할 비밀번호가 다릅니다.");  
  }
} else{
  if(mb_strlen($username,'UTF-8') == 0){
    alert_back("닉네임을 입력해주세요.");
  }
  if(mb_strlen($username,'UTF-8') > 16 || mb_strlen($username,'UTF-8') < 4){
    alert_back("닉네임은 4~16자 사이로 입력해주세요.");
  }
  if($already_username != NULL){
    alert_back("이미 사용중인 닉네임 입니다.");  
  }
  
  sql_query("UPDATE users SET 
    user_name='$username'
    WHERE id='$user_id'
  ");
  history_back();
}


if($member != NULL){
  sql_query("UPDATE users SET 
    user_name='$username',
    password=PASSWORD('$new_pw')
    WHERE id='$user_id'
  ");
  history_back();
} else{
  alert_back("비밀번호가 일치하지 않습니다.");
}
?>