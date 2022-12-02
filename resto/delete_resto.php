<?php

session_start();

if (empty($_SESSION["login"])) {
  header("location: ../login.php?message=belum_login");
  exit;
}

include "../config/resto_controller.php";

// mengambil id resto dari url
$id_resto = (int)$_GET['id'];

if (delete_resto($id_resto) > 0) {
    header("location: resto.php");
  } else {
    echo "<script>
    alert('Delete Data Gagal!');
    </script>";
  }


?>