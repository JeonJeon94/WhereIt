<?php
  include "dbconfig.php";
  $username = $_GET['username'];
  $email = $_GET['email'];
  $pw = $_GET['pw'];
  $member = sql_one("SELECT id FROM users WHERE user_name = '$username'");
  if(!empty($member[id])){
    // $url = './signup.php?username='. $username .'&email=' . $email .'&pw='. $pw;
    alert($member[id]);
    alert_back("이미 사용중인 닉네임 입니다.");
  }
?>
<script src="http://13.124.4.4/gen_api.js"></script>
<script>
  api_send_mail('<?= $email; ?>','<?= $pw; ?>','<?= $username; ?>', function(res){
    if(res.code == 1){
      $('.page-num2').css('display','none')
      $('.signup-end').css('display','block')
    }else{
      <?php 
        alert_redirect("가입 도중 문제가 발생했습니다. 다시 시도해주세요!",'./signup.php');
      ?>
    }
  })

</script>