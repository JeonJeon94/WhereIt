<?php $page="login" ?>

<?php
include './dbconfig.php';
?>

<!doctype <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="./css/a_style.css?ver=1.1"  type="text/css" />
  <title>Page Title</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="default-page <?=$page?>-page">
  <div class="main">
    <form class="test-form" method="post" action="admin_check.php">
      <input id="admin_id" name="admin_id" type="text"/>
      <input id="admin_pw" name="password" type="password"/>    
      <input id="admin-btn" type="submit" value="전송"/>
    </form>
  </div>
</body>
<script>
  $('#admin_id').keydown(function(key){
    if(key.keyCode == 13){
      $('#admin_pw').focus();
      event.preventDefault();
    }
  });
</script>
</html>