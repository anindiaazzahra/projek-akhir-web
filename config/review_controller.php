<?php

include "database.php";

// fungsi mengambil semua review berdasarkan resto
function get_all_review_by_resto($id_resto) {

  // memanggil koneksi database
  global $db;

  $query = "SELECT r.id, r.judul, r.deskripsi, r.tanggal_pergi, r.rating, r.id_resto, u.id AS id_user, u.username 
  FROM review AS r
  INNER JOIN user AS u ON r.id_user = u.id
  WHERE r.id_resto = $id_resto
  ORDER BY r.id DESC";

  $result = mysqli_query($db, $query);
  $rows = [];

  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


// fungsi mengambil data review berdasarkan id
function get_review_by_id($id) {

  global $db;

  $query = "SELECT * FROM review WHERE id = $id";

  $result = mysqli_query($db, $query);
  $rows = [];

  $rows = mysqli_fetch_assoc($result);

  return $rows;
}



// fungsi menambah review
function post_review($post) {
  
  global $db;

  $judul = strip_tags($post["judul"]);
  $deskripsi = strip_tags($post["deskripsi"]);
  $tanggal_pergi = strip_tags($post["tanggal"]);
  $rating = strip_tags($post["rating"]);
  $id_user = strip_tags($post["id_user"]);
  $id_resto = strip_tags($post["id_resto"]);


  // query tambah data menu
  $query = "INSERT INTO review VALUES(NULL, '$judul', '$deskripsi', '$tanggal_pergi', '$rating', '$id_user', '$id_resto')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// fungsi mengedit review
function put_review($post) {
  
  global $db;

  $id = strip_tags($post["id_review"]);
  $judul = strip_tags($post["judul"]);
  $deskripsi = strip_tags($post["deskripsi"]);
  $tanggal_pergi = strip_tags($post["tanggal"]);
  $rating = strip_tags($post["rating"]);

  // query edit review
  $query = "UPDATE review SET judul = '$judul', deskripsi = '$deskripsi', tanggal_pergi = '$tanggal_pergi', rating = '$rating' WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// fungsi menghapus review
function delete_review($id) {
  
  global $db;

  // query delete review
  $query = "DELETE FROM review WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


?>