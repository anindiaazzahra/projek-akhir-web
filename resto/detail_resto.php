<?php

session_start();

if (empty($_SESSION["login"])) {
  header("location: ../login.php?message=belum_login&location=index.php");
  exit;
}

include "../config/resto_controller.php";
include "../config/review_controller.php";

// mengambil id resto dari url
$id_resto = (int)$_GET['id'];

$resto = get_resto_by_id($id_resto);
$data_review = get_all_review_by_resto($id_resto);

include "../config/star_rating.php";

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
    <link rel="stylesheet" href="../assets/css/style-detail.css">
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
                <a aria-current="page" href="resto.php">Recommendations</a>
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

      <div class="detail">
      <div class="row">
          <div class="col-md-5">
            <img src="../assets/img/<?= $resto['img']; ?>" alt="" width="200px">
          </div>
          <div class="col-md-6 data-resto">
            <h1><?= $resto['nama_resto']; ?></h1>
            <div class="d-flex detail-rating">
              <p><i class="bi bi-star-fill"></i></p>
              <p><?= number_format($resto['rating'], 1); ?></p>
            </div>
            <div class="d-flex alamat">
              <p><i class="bi bi-geo-alt-fill"></i></p>
              <p><?= $resto['alamat']; ?></p>
            </div>
            <div class="d-flex jam">
              <p><i class="bi bi-clock-fill"></i></p>
              <p><?= substr($resto['jam_buka'], 0, 5); ?> - <?= substr($resto['jam_tutup'], 0, 5); ?></p>
            </div>
            <div class="d-flex harga">
              <p><i class="bi bi-currency-dollar"></i></p>
              <p><?= "Rp " . number_format($resto['harga'], 0, ',', '.'); ?></p>
            </div>
            <div class="action-admin">
                <?php 
              if ($_SESSION['role'] == "Admin") {
                echo "<a href='edit_resto.php?id=$resto[id]'><i class='bi bi-pencil-square action-btn'></i></a>";
                ?>
                <a href="delete_resto.php?id=<?=$resto['id']; ?>" onclick='return confirm("Yakin untuk menghapus?")';><i class="bi bi-trash3-fill action-btn"></i></a>
                <?php
              }
              ?>
            </div>
            <a href="../review/add_review.php?id=<?= $resto['id']; ?>" class="btn-review">Tulis Review<i class="bi bi-chat"></i></a>
            
          </div>
        </div>
      </div>
      <div class="reviews">
      <?php
        if (empty($data_review)) { ?>
          <center><h6>No reviews yet. Be the first to add a review.</h6></center>
        <?php
        } else {
        ?>
          <h6>What people say about <?= $resto['nama_resto']; ?> </h6>
          <?php foreach($data_review as $review) : ?>
          <div class="user-review">
            <p><i class="bi bi-person-circle"></i></p>
            <h5><?= $review['username']; ?></h5>
            <p class="tgl">Berkunjung pada <?= date('d F Y', strtotime($review['tanggal_pergi'])); ?></p>
            <h3><?= $review['judul']; ?></h3>
            <p class="isi"><?= $review['deskripsi']; ?></p>
            <p class="rating"><?= star_rating($review['rating']); ?></p>
            <div class="action">
            <?php 
            if ($review['id_user'] == $_SESSION['id']) {
              echo "<a href='../review/edit_review.php?id_resto=$id_resto&id_review=$review[id]'><i class='bi bi-pencil-square action-btn'></i></a>";
              ?>
              <a href="../review/delete_review.php?id_resto=<?=$id_resto; ?>&id_review=<?=$review['id']; ?>" onclick='return confirm("Yakin untuk menghapus?")';><i class='bi bi-trash3-fill action-btn'></i></a>
              <?php
            }
            ?>
            </div>
          </div>
          <?php endforeach; 
          } ?>
      </div>
    </div>

    <footer>
      <div class="container-fluids">
        <div class="row justify-content-center">
          <div class="col-md-3">
            <p>&copy; <?php echo date("Y"); ?> Kaki Lima. All rights reserved.</p>
          </div>
          <div class="col-md-3">
            <p>Terms of Service | Privacy Policy</p>
          </div>
        </div>
      </div>
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>