<?php

session_start();

if (empty($_SESSION["login"])) {
  header("location: ../login.php?message=belum_login");
  exit;
}

include "../config/resto_controller.php";

$data_resto = get_all_resto();

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
    <link rel="stylesheet" href="../assets/css/style-recommendations.css">
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
      <h1>Recommendations</h1>
      <div id="recommendations">
      <div class="row">
      <?php foreach ($data_resto as $resto) : ?>
        <div class="col-md-3">
          <a href="detail_resto.php?id=<?= $resto['id']; ?>" class="a-btn a-card">
            <div class="card mb-4">
              <img src="../assets/img/<?=$resto['img']; ?>" class="card-img-top" alt="foto <?= $resto['nama_resto']; ?>">
              <div class="d-flex rating">
                <p><i class="bi bi-star-fill"></i></p>
                <p class="ms-1"><?= number_format($resto['rating'], 1); ?></p>
              </div>
              <div class="card-body">
                <h3><?= $resto['nama_resto']; ?></h3>
                <div class="d-flex">
                  <p><i class="bi bi-geo-alt-fill text-danger"></i></p>
                  <p class="ms-1"><?= $resto['alamat']; ?></p>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
      </div>
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