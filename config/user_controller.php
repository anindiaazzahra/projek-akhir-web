<?php

include "database.php";

// fungsi mengambil semua user
function get_all_user() {

  // memanggil koneksi database
  global $db;

  $query = "SELECT u.id, u.username, u.password, r.id AS id_role, r.nama_role
  FROM user AS u
  INNER JOIN role AS r ON u.id_role = r.id";

  $result = mysqli_query($db, $query);
  $rows = [];
  
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


// fungsi mengambil user berdasarkan username
function get_user_by_username($username) {

  global $db;

  $query = "SELECT u.id, u.username, u.password, r.id AS id_role, r.nama_role
  FROM user AS u
  INNER JOIN role AS r ON u.id_role = r.id
  WHERE username = '$username'";

  $result = mysqli_query($db, $query);

  return $result;
}


// fungsi menambahkan data user/register
function register_user($post) {

  global $db;

  $username = strip_tags($post['username']);
  $password = strip_tags($post['password']);
  $id_role  = strip_tags($post['id_role']);

  $check_username = get_user_by_username($username);

  if (empty($check_username)) {
    // hash password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query tambah user
    $query = "INSERT INTO user VALUES (NULL, '$username', '$password', '$id_role')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

  } else {
    header("Location: register.php?message=username_terpakai");
  }
}



?>