<?php
  include "dbconfig.php";
  
  $username = $_GET['username'];
  $email = $_GET['email'];
  $pw = $_GET['pw'];
  
  
  $member = sql_one("SELECT id FROM users WHERE user_name = '$username'");

  if($member != NULL){
    alert_back("이미 사용중인 닉네임 입니다.");
  }
?>
<script src="http://13.124.4.4/gen_api.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

  function alert_back(msg){
    alert(msg);
    window.history.back();
  }
  $(function(){
    api_send_mail('<?= $email; ?>','<?= $pw; ?>','<?= $username; ?>', function(res){
      if(res.code == 1){
        location.href='./signup.php?checksum=ok';

      }else if(res.code == -2){
        if(res.err.indexOf('Duplicate') >= 0 ){
          alert_back("이미 가입되어 있는 이메일입니다.");
        }else{
          alert_back("이메일 전송에 실패했습니다. 정확한 이메일을 입력해주세요");
        }
      }else{
        alert_back("가입도중 문제가 발생했습니다. 다시 시도해주세요!");
      }
    })

  })

</script>