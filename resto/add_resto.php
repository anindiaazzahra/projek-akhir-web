<?php

session_start();

if (empty($_SESSION["login"])) {
  header("location: ../login.php?message=belum_login");
  exit;
}

include "../config/resto_controller.php";

// check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
  if (post_resto($_POST) > 0) {
    header("location: resto.php");
  } else {
    echo "<script>
      alert('Input Data Gagal!');
      </script>";
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kakilima.com</title>
    <link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style-form.css">
  </head>
  <body>
    <div class="container-fluids">
      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-expand-lg navbar">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <img src="../assets/logo.png" alt="" class="logo" width="180px">
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="../index.php">Home</a> 
              </li>
              <li class="nav-item">
                <a aria-current="page" href="../index.php#recommendations">Recommendations</a>
              </li>
              <li class="nav-item">
                <a href="../index.php#about">About</a>
              </li>
              <li class="nav-item">
                <a href="../index.php#contact">Contact</a>
              </li>
            </ul>
          </div>
          <ul class="d-flex signed-in">
          <?php
          if ($_SESSION['login']) {
            if ($_SESSION['role'] == "Admin") {
              echo "<li class='nav-item dropdown d-add'>
              <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='bi bi-plus-lg add'></i>
              </a>
              <ul class='dropdown-menu dropdown-menu-start'>
                <li><a class='dropdown-item' href='add_resto.php'>Add Recommendation</a></li>
              </ul>
            </li>";
            }
            echo "</li>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle a-profil' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='bi bi-person-circle profil'></i>
              </a>
              <ul class='dropdown-menu dropdown-menu-start'>
                <li><span class='dropdown-item-text'>
                  <p>Signed in as</p>
                  <h6>$_SESSION[username]</h6></span>
                </li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' href='../logout.php'>Sign out</a></li>
              </ul>
            </li>";
          ?>
          </ul>
          <?php
          } else {
            echo "<p><a href='login.php?message=belum_login&location=index.php'>Sign in</a></p>";
          }
          ?>  
        </div>
      </nav>
      <!-- Akhir navbar -->
    </div>
    
    <div class="container">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="inputGambar" class="form-label">Gambar</label>
          <input type="file" id="inputGambar" name="img" required>
        </div>
        <div class="mb-3">
          <label for="inputResto" class="form-label">Nama Resto</label>
          <input type="text"  id="inputResto" name="nama_resto" placeholder="Masukkan nama resto" aria-label="nama resto input" required>
        </div>
        <div class="mb-3">
          <label for="inputAlamat" class="form-label">Alamat</label>
          <textarea  id="inputAlamat" name="alamat" rows="3" placeholder="Masukkan alamat" aria-label="alamat input" required></textarea>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="inputJamBuka" class="form-label">Jam Buka</label>
              <input type="time"  id="inputJamBuka" name="jam_buka" aria-label="jam buka input" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="inputJamTutup" class="form-label">Jam Tutup</label>
              <input type="time"  id="inputJamTutup" name="jam_tutup" aria-label="jam tutp input" required>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="inputHarga" class="form-label">Harga</label>
          <input type="number"  id="inputHarga" name="harga" placeholder="Masukkan harga" aria-label="harga input" required>
        </div>
        
        <button type="submit" name="tambah" >Tambah</button>
      </form>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>