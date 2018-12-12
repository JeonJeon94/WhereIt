<?php
include "./dbconfig.php";
$id = $_REQUEST[id];

// $s = curl_init(); 
// curl_setopt($s,CURLOPT_URL,"https://kapi.kakao.com/v2/user/me");
// curl_setopt($s,CURLOPT_HTTPHEADER,array("Authorization: Bearer $token")); 
// curl_setopt($s,CURLOPT_RETURNTRANSFER,true); 

// $ret = curl_exec($s);
// $json = json_decode($ret,true);

// $id = $json["id"];
if($id){
  // ok
  // isnert to db
  $sql = sql_one("SELECT id, user_email FROM users WHERE user_email = $id");
  if(!$sql){
    sql_one("INSERT INTO users SET user_email='$id', register='google'");
    
    $sql = sql_one("SELECT id, user_email FROM users WHERE user_email = $id");
    $_SESSION['user_id']=$sql[id];
    
    php_redirect("./index.php");

  }else{
    $_SESSION['user_id']=$sql[id];
    
    php_redirect("./index.php");
  }
}else{
  // hacking!
  return ;
}

?>