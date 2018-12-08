<?php
include "dbconfig.php";

$user_id = $_GET['id'];

$new_pw=escape_string($_POST['new_pw']);
$new_pw2=escape_string($_POST['new_pw2']);

if(mb_strlen($new_pw)<8 || mb_strlen($new_pw2)<8){
  alert_back("비밀번호는 8자리로 설정해주세요.");
}
if($new_pw != $new_pw2){
  alert_back("변경할 비밀번호가 다릅니다.");
}
$member = sql_one("SELECT * FROM users WHERE id='$user_id'");
if($member){
  sql_query("UPDATE users SET 
    password=PASSWORD('$new_pw')
    WHERE id = '$member[id]'
  ");
?>
  <script>location.href='./edit_pwform.php?state=true'</script>

<?php
}else {
  alert_back("비밀먼호가 다릅니다.");
}
?>