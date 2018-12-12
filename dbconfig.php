<?php 
  //CbpMTVe6VFcLdoPNJ7if0MWp
  session_start();

  error_reporting(0);
  ini_set("display_errors", 1);

  $dbHost = "54.180.107.55";
	$dbUser = "root";
	$dbpass = "qwer1234!"; //DB패스워드를 입력해 주세요
	$dbName = "whereit"; // DB명을 입력해 주세요.

	$conn = mysqli_connect($dbHost,$dbUser,$dbpass);
	mysqli_select_db($conn,$dbName);

  mysqli_query($conn,"SET NAMES utf8mb4");

  function escape_string($str){
    global $conn;
    return mysqli_real_escape_string($conn, $str); 
  }
  function sql_query($sql){
    global $conn;
    return mysqli_query($conn,$sql);
  }
  
  function sql_fetch($result){
    return mysqli_fetch_assoc($result);
  }
  
  function sql_select($sql,$cache=null) {
    global $redis;
    if($cache){
      $m = md5($sql);
      $data = $redis->get($m);
      if($data){
        return json_decode(str_replace("\\\"","\"",str_replace("\\\\","\\",$data)),true);
      }
    }
  
    $res = sql_query($sql);
    $list = array();
    while($row = mysqli_fetch_assoc($res)) {
      $list[] = $row;
    }
  
    if($cache){
      $data = escape_string(json_encode($list));
      $redis->set($m, $data);
      $redis->setTimeout($m, $cache);
    }
    return $list;
  }
  
  function sql_one($sql){
    global $conn;
    $result = mysqli_query($conn,$sql);
    return sql_fetch($result);
  }
  
  function php_redirect($url, $permanent = false)
  {  
      if (headers_sent() === false)
      { 
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
      }

      exit();
  }
  function history_back(){
    echo "<script>window.history.back()</script>";
    exit();	
  }
  function alert($msg){
    echo "<script>alert('$msg')</script>";
  }
  function alert_back($msg){
    alert($msg);
    history_back();
  }
  function alert_redirect($msg,$url){
    alert($msg);
  }
?>
