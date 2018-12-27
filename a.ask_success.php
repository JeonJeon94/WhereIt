<?php
  include "dbconfig.php";

  if(!empty($_POST['reply_email']) && !empty($_POST['reply_id'])){
    if(empty($_POST['reply_title']) && empty($_POST['reply_text'])){
      
      alert_back('제목 또는 내용을 입력해주세요.');
      
    }else{
      $email = $_POST['reply_email'];
      $id = $_POST['reply_id'];
      $title = $_POST['reply_title'];
      $content = $_POST['reply_text'];
    }
  }else{
    alert_back('이메일을 입력해주세요.');
  }
?>
<script src="http://52.79.100.193/gen_api.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script> 
  $(function(){
    api_send_email('<?=$email?>','<?=$title?>','<?=$content?>',function(res){
      if(res.code==1){
        alert("이메일 전송 성공");
        <?php
          sql_query("UPDATE ask SET check_e=1 WHERE id=$id;");
        ?>
        location.href='./a.ask_list.php';
      }else{
        alert("이메일 전송에 실패하였습니다.");
      }
    });
  });
</script>