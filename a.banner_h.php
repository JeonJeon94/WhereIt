<?php
include "dbconfig.php";

if($_GET['search_h'] == NULL){
  history_back();
  
}else{
  $search_h = $_GET['search_h'];
  sql_query("UPDATE banner_text SET 
    search_h = '$search_h'
    WHERE id = 1
  ");
  history_back();
}
?>