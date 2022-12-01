<?php

include "database.php";

function get_all_role() {

  // memanggil koneksi database
  global $db;

  $query = "SELECT * FROM role";

  $result = mysqli_query($db, $query);
  $rows = [];
  
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

?>