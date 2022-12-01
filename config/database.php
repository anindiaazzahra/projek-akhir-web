<?php

$hostname	= "localhost";
$username	= "root";
$password	= "";
$database	= "db_kakilima";

$db = new mysqli($hostname, $username, $password, $database);

// cek koneksi
if($db->connect_error) {
  die("Error : ".$db->connect_error);
}

?>