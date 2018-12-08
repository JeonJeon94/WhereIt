<script src="http://13.124.4.4/gen_api.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
  include "dbconfig.php";
  $username = $_GET['username'];
  if(isset($_GET['username'])){
    ///// controll0
  }
  $email = $_GET['email'];
  $pw = $_GET['pw'];
  $member = sql_one("SELECT id FROM users WHERE user_name = '$username'");
  if($member != NULL){
    alert($member);
    // alert_back("이미 사용중인 닉네임 입니다.");
  }
?>

<script>
  function alert_back(msg){
    alert(msg);
    window.history.back();
  }
  $(function(){
    api_send_mail('<?= $email; ?>','<?= $pw; ?>','<?= $username; ?>', function(res){
      if(res.code == 1){
        $('.page-num2').css('display','none')
        $('.signup-end').css('display','block')
      } else if(res.code == -1){
        alert(res);
        alert_back("이메일 전송에 실패했습니다, 정확한 이메일을 기입해주세요");
      } else if(res.code == -2){
        alert(res);
        alert_back("이메일 전송에 실패했습니다, 정확한 이메일을 기입해주세요");
      } else{
        alert_back("가입도중 문제가 발생했습니다. 다시 시도해주세요!");
      }
    })

  })

</script>