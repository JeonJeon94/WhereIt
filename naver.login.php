<?php
if(strpos($_SERVER["REQUEST_URI"], "?") == FALSE){
?>
<script>
  location.href = location.href.replace(/#/,"?")
</script>
<?php
}else{
  $token = $_REQUEST["access_token"];
  $type = $_REQUEST["token_type"];

  $s = curl_init(); 
  curl_setopt($s,CURLOPT_URL,"https://openapi.naver.com/v1/nid/me");
  curl_setopt($s,CURLOPT_HTTPHEADER,array("Authorization: $type $token")); 
  curl_setopt($s,CURLOPT_RETURNTRANSFER,true); 

  $ret = curl_exec($s);
  $json = json_decode($ret,true);

  $json["response"]["email"];
  if($json["resultcode"] == "00"){
    // ok
    // isnert to db
  }else{
    // hacking!
    return ;
  }
}
?>