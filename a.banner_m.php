<?php
include "dbconfig.php";

if($_GET['search_b'] == NULL){
  history_back();
}else{
  $search_b = $_GET['search_b'];
  sql_query("UPDATE banner_text SET
    search_b = '$search_b'
    WHERE id = 2
  ");
  history_back();
}
?>
