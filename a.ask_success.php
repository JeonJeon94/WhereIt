<?php
  include "dbconfig.php";

  if(!empty($_POST['reply_email']) && !empty($_POST['reply_id'])){
    $email = $_POST['reply_email'];
    $id = $_POST['reply_id'];

    if(!empty($_POST['reply_title']) && !empty($_POST['reply_text'])){
      $title = $_POST['reply_title'];
      $content = $_POST['reply_text'];
?>
  
<?php
    sql_query("UPDATE ask SET check_e=1 WHERE id='$id'");
    php_redirect('./a.ask_list.php');

    }else{
    alert_back('제목 또는 내용을 입력해주세요.');
    }
  }else{
    alert_back('이메일을 입력해주세요.');
  }

?>