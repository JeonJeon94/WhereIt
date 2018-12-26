<?php
  include "dbconfig.php";

  $id = $_GET['id'];

  sql_one("DELETE FROM rank WHERE id in ($id)");
  history_back();
?>