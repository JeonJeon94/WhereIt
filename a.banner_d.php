<?php
  include "dbconfig.php";

  $id = $_GET['id'];

  sql_one("DELETE FROM banner_file WHERE id in ($id)");
  history_back();

?>