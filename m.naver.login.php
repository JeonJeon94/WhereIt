<?php
include "./dbconfig.php";
if(strpos($_SERVER["REQUEST_URI"], "?") == FALSE){

?>
<script>
  location.href = location.href.replace(/#/,"?")
</script>
<?php
}else{
  $token = $_REQUEST["access_token"];
  $type = $_REQUEST["token_type"];
  $state = $_REQUEST["state"];
  $expires_in = $_REQUEST["expires_in"];

  $s = curl_init(); 
  curl_setopt($s,CURLOPT_URL,"https://openapi.naver.com/v1/nid/me");
  curl_setopt($s,CURLOPT_HTTPHEADER,array("Authorization: $type $token")); 
  curl_setopt($s,CURLOPT_RETURNTRANSFER,true); 
  
  $ret = curl_exec($s);
  $json = json_decode($ret,true);
  
  $id = $json["response"]["id"];
  if($json["resultcode"] == "00"){
    // ok
    // isnert to db
    var_dump($json);
    $sql = sql_one("SELECT id, user_email FROM users WHERE user_email = $id");
    if(!$sql){
      sql_one("INSERT INTO users SET user_email='$id', resister='naver'");
      
      $sql = sql_one("SELECT id, user_email FROM users WHERE user_email = $id");
     
      $_SESSION['user_id']=$sql[id];

      php_redirect("/");

    }else{
      $_SESSION['user_id']=$sql[id];
      
      php_redirect("/");
    }
  }else{
    // hacking!
    return ;
  }
}
?>