<?php
$NEED_LOGIN=true;
include './head.php';

$user_id = $member[id];

$password=escape_string($_POST['password']);
$new_pw=escape_string($_POST['new_pw']);
$new_pw2=escape_string($_POST['new_pw2']);
$username=escape_string($_POST['username']); 

if(strlen($username) == 0){
  alert_back("닉네임을 입력해주세요.");
}
if($new_pw != $new_pw2){
  alert_back("변경할 패스워드가 다릅니다.");
}

$member = sql_one("SELECT * FROM users WHERE id='$user_id' and password=PASSWORD('$password')");
if($member){
  sql_query("UPDATE users SET 
    user_name='$username',
    password=PASSWORD('$new_pw')
    WHERE id='$user_id'
  ");
  ?>
  <script>location.href='/myinfo.php'</script>
  <?php
}else {
  alert_back("패스워드가 다릅니다.");
}
?>