<?php

include "database.php";

// fungsi mengambil semua data resto sort by rating
function get_all_resto() {
  
  // memanggil koneksi database
  global $db;

  $query = "SELECT * FROM resto ORDER BY rating DESC";

  $result = mysqli_query($db, $query);
  $rows = [];

  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// fungsi mengambil data resto order by rating 8 teratas
function get_resto_by_rating() {
  
  global $db;

  $query = "SELECT * FROM resto ORDER BY rating DESC  LIMIT 8";

  $result = mysqli_query($db, $query);
  $rows = [];

  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


// fungsi mengambil data resto berdasarkan id
function get_resto_by_id($id) {
  
  global $db;

  $query = "SELECT * FROM resto WHERE id = $id";

  $result = mysqli_query($db, $query);

  $row = mysqli_fetch_assoc($result);

  return $row;
}


// fungsi menambah data resto
function post_resto($post) {
  
  global $db;

  $img = upload_img();
  $nama_resto = strip_tags($post["nama_resto"]);
  $alamat = strip_tags($post["alamat"]);
  $jam_buka = strip_tags($post["jam_buka"]);
  $jam_tutup = strip_tags($post["jam_tutup"]);
  $harga = strip_tags($post["harga"]);

  // cek upload image
  if(!$img) {
    return false;
  }

  // query tambah data resto
  $query = "INSERT INTO resto VALUES (NULL, '$img', '$nama_resto', '$alamat', '$jam_buka', '$jam_tutup', 0, '$harga')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// fungsi mengedit data resto
function put_resto($post) {
  
  global $db;

  $id   = $post['id_resto'];
  $imgLama = strip_tags($post["imgLama"]);
  $nama_resto = strip_tags($post["nama_resto"]);
  $alamat = strip_tags($post["alamat"]);
  $jam_buka = strip_tags($post["jam_buka"]);
  $jam_tutup = strip_tags($post["jam_tutup"]);
  $rating = strip_tags($post["rating"]);
  $harga = strip_tags($post["harga"]);

  // cek upload gambar baru atau tidak
  if($_FILES['img']['error'] === 4) {
    $img = $imgLama;
    $query = "UPDATE resto SET nama_resto = '$nama_resto', alamat = '$alamat', jam_buka = '$jam_buka', jam_tutup = '$jam_tutup', rating = '$rating', harga = '$harga' WHERE id = $id";
  } else {
    $img = upload_img();
    // menghapus gambar lama
    unlink('../assets/img/' . $imgLama);
    $query = "UPDATE resto SET img = '$img', nama_resto = '$nama_resto', alamat = '$alamat', jam_buka = '$jam_buka', jam_tutup = '$jam_tutup', rating = '$rating', harga = '$harga' WHERE id = $id";
  }

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}

// fungsi mengedit rating resto
function put_rating_resto($id) {
  
  global $db;

  // query update rating
  $query = "UPDATE resto SET rating = (SELECT AVG(rating) FROM review WHERE id_resto = $id) WHERE id = $id";


  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// fungsi menghapus data resto
function delete_resto($id) {
  
  global $db;

  // mengambil gambar by id
  $data = get_resto_by_id($id);
  // menghapus gambar di assets/img
  unlink('../assets/img/' . $data['img']);

  // query delete data resto
  $query = "DELETE FROM resto WHERE id = $id";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}


// fungsi menambahkan gambar
function upload_img() {

  $namaFile = $_FILES['img']['name'];
  $ukuranFile = $_FILES['img']['size'];
  $error = $_FILES['img']['error'];
  $tmpName = $_FILES['img']['tmp_name'];

  // cek file yang diupload
  $ekstensifileValid = ['jpg', 'jpeg', 'png'];
  // memeriksa ekstensi setelah nama file
  $ekstensifile = explode('.', $namaFile);
  // mengubah ekstensi menjadi huruf kecil
  $ekstensifile = strtolower(end($ekstensifile));

  // cek format/ekestensi file
  if (!in_array($ekstensifile, $ekstensifileValid)) {
    echo "<script>
            alert('Format File Tidak Valid!');
            document.location.href = 'resto.php';
          </script>";
    die();
  }

  // cek ukuran file
  if ($ukuranFile > 5000000) {
    echo "<script>
            alert('Ukuran File Terlalu Besar!');
            document.location.href = 'resto.php';
          </script>";
    die();
  }

  // generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensifile;
  
  // memindahkan ke local forder
  move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
  return $namaFileBaru;
}


?>