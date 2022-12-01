<?php

session_start();

if (empty($_SESSION["login"])) {
  header("location: ../login.php?message=belum_login");
  exit;
}

include "../config/review_controller.php";
include "../config/resto_controller.php";

// mengambil id review dari url
$id_review = (int)$_GET['id_review'];

// mengambil id resto dari url
$id_resto = (int)$_GET['id_resto'];



if (delete_review($id_review) > 0 && put_rating_resto($id_resto) > 0) {
    header("location: ../resto/detail_resto.php?id=$id_resto");
  } else {
    echo "Delete Data Gagal.";
  }


?>