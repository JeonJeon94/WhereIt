<?php
$NEED_LOGIN = true;
include './head.php';

$shopId=escape_string($_REQUEST['shopId']);
$user_id=$member[id];

$favorit = sql_one("SELECT * FROM favorit WHERE shopId='$shopId' and user_id='$user_id'");
if($favorit){
  sql_one("DELETE FROM favorit WHERE shopId='$shopId' and user_id='$user_id'");
}else {
  sql_one("INSERT INTO favorit SET shopId='$shopId', user_id='$user_id'");
}
?>
<script>
location.href="/detail.php?id=<?=$shopId?>"
</script>
