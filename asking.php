<?php
  include "dbconfig.php";

  if(!empty($_POST["title"])){
    $title = $_POST["title"];

    if(!empty($_POST["e_mail"])){
      $email = escape_string($_POST["e_mail"]);
      if(!empty($_POST["contents"])){
        $contents = $_POST["contents"];
        
        sql_one("INSERT INTO ask SET title='$title',email='$email',contents='$contents'");

      }else{
        alert_back("문의 내용을 입력해주세요.");
      }
    }else{
      alert_back("이메일을 입력해주세요.");
    }
  }else{
    alert_back("문의 제목을 입력해주세요.");
  }
  
  php_redirect("./ask.php?asksum=ok");
?>