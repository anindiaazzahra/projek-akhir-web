<?php

session_start();

if(empty($_SESSION['login'])){
  $_SESSION['login'] = false;
}

include "config/resto_controller.php";

$data_resto = get_resto_by_rating();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kakilima.com</title>
    <link rel="shortcut icon" href="assets/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body class="index">
    <section id="home">
      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-expand-lg navbar">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <img src="assets/logo-white.png" alt="" class="logo-white" width="180px">
          <img src="assets/logo.png" alt="" class="logo" width="180px">
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a aria-current="page" href="#home">Home</a> 
              </li>
              <li class="nav-item">
                <a href="#about">About</a>
              </li>
              <li class="nav-item">
                <a href="#recommendations">Recommendations</a>
              </li>
              <li class="nav-item">
                <a href="#contact">Contact</a>
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
                <li><a class='dropdown-item' href='resto/add_resto.php'>Add Recommendation</a></li>
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
                <li><a class='dropdown-item' href='logout.php'>Sign out</a></li>
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
      <div class="hero"></div>
      <h1>Get your best Kaki Lima recommendations.</h1>
      <!-- <a href="" class="a-btn">View Recommendations</a> -->
    </section>


    <!-- Recommendations -->
    <section id="recommendations">
    <div class="container-fluids">
      <h2>Top Recommendations</h2>
      <div class="row">
      <?php foreach ($data_resto as $resto) : ?>
        <div class="col-md-3">
          <a href="resto/detail_resto.php?id=<?= $resto['id']; ?>" class="a-btn">
            <div class="card mb-4">
              <img src="assets/img/<?=$resto['img']; ?>" class="card-img-top" alt="foto <?= $resto['nama_resto']; ?>">
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
      <a href="
        <?php
          if(empty($_SESSION['login'])){
            echo "login.php?message=belum_login&location=resto/resto.php";
          } else {
            echo "resto/resto.php";
          }
        ?>
      " class="a-button">Show all recommendations</a>
    </div>
    </section>
    <!-- Akhir Recommendations -->


    <!-- About -->
    <section id="about">
    <div class="container-fluids">
      <h2>What we do</h2>
      <div class="row">
        <div class="col-md-6">
          <div class="card border-0">
            <div class="card-body">
              <h5 class="card-title">Membantu para pedagang kaki lima</h5>
              <p class="card-text">Kakilima.com akan membantu para pedagang kaki lima untuk bersaing dalam bisnis kuliner di era digital.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0">
            <div class="card-body">
              <h5 class="card-title">Rekomendasi makanan baru setiap harinya</h5>
              <p class="card-text">Kakilima.com akan memberikan informasi yang terbaru dan terpercaya kepada para penggunanya.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0">
            <div class="card-body">
              <h5 class="card-title">Menghadirkan kuliner yang lebih variatif</h5>
              <p class="card-text">Kakilima.com tidak hanya menghadirkan makanan yang berasal dari restorant atau rumah makan tetapi juga menghadirkan rekomendasi makanan dari pedagang kaki lima.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border-0">
            <div class="card-body">
              <h5 class="card-title">Memberikan informasi yang lengkap</h5>
              <p class="card-text">Kakilima.com akan memberikan informasi yang lengkap dan terpercaya kepada para penggunanya.</p>
            </div>
          </div>
        </div>
    </div>
    </section>
    <!-- Akhir About -->


    <!-- Contact -->
    <section id="contact">
    <div class="container-fluids mt">
      <div class="ta">
        <h1>Reach out for a new recommendation or just say hello</h1>
      </div>
      <div class="container contact-us">
        <div class="row">
          <div class="col-md-6">
            <h3 class="h6 hide-on-fullwidth">Send Us Message</h3>
            <form action="">
              <div class="mb-3">
                <input type="text"  id="name" placeholder="Your name">
              </div>
              <div class="mb-3">
                <input type="email"  id="email" placeholder="Your email">
              </div>
              <div class="mb-3">
                <input type="text"  id="subject" placeholder="Subject">
              </div>
              <div class="mb-3">
                <textarea  id="message" rows="3" placeholder="Your Message"></textarea>
              </div>
              <button type="reset" >Submit</button>
          </div>
          <div class="col-md-4 ms-5">
            <div class="contact-info">
              <h3 class="h6 hide-on-fullwidth cinfo ms-5">Contact Info</h3>
              <div class="cinfo ms-5">
                <h5>Email Us At</h5>
                <p>contact@kakilima.com</p>
                <p> info@kakilima.com</p>
              </div>
              <div class="cinfo ms-5">
                <h5>Call Us At</h5>
                <p>Phone: 08123456789</p>
                <p>Mobile: 08123456789</p>
              </div>
              <div class="ms-5">
                <h5>Follow Us</h5>
                </div>
                <ul class="contact-social">
                  <li class="ib"><a href=""><i class="bi bi-instagram"></i></a></li>
                  <li class="ib"><a href=""><i class="bi bi-twitter"></i></a></li>
                  <li class="ib"><a href=""><i class="bi bi-facebook"></i></a></li>
                  <li class="ib"><a href=""><i class="bi bi-youtube"></i></a></li>            
                </ul>
            </div>
          </div>
        </div>
      </div>   
    </div>
    </section>
    <!-- Akhir Contact -->


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

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>