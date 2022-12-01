<?php

session_start();

require "config/user_controller.php";

// mengecek apakah tombol login ditekan
if (isset($_POST['login'])) {

  $location = $_GET['location'];
  if (empty($location)) {
    $location = "index.php";
  }
  // mengambil input username dan password
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // check apakah username ada di database
  $result = get_user_by_username($username);

  // jika username ada
  if (mysqli_num_rows($result) === 1) {
    // check password
    $row = mysqli_fetch_assoc($result);
    
    if (password_verify($password, $row['password'])) {
      // set session
      $_SESSION['login'] = true;
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['role'] = $row['nama_role'];

      header("location: $location");
      exit;
    } else {
      header("location: login.php?message=gagal&location=$location");
    }
  } else {
    header("location: login.php?message=gagal&location=$location");
  }
}

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
    <link rel="stylesheet" href="assets/css/style-login-register.css">
  </head>
  <body>
    <div class="container">
      <h1>Hello!</h1>
      <?php
      if (isset($_GET['message'])) {
          if ($_GET['message'] == 'gagal') {
              echo "<h5> Incorrect username or password </h5>";
          } elseif($_GET['message'] == 'logout') {
              echo "<h5> You have successfully sign out </h5>";
          } elseif($_GET['message'] == 'belum_login') {
              echo "<h5> Please sign in to continue </h5>";
          }
      }
      ?>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="inputUsername" class="form-label">Username</label>
          <input type="text" id="inputUsername" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password"  id="inputPassword" name="password" placeholder="Password" required>
        </div>
        <button type="submit" name="login">Sign In</button>
      </form>
      <h6>Don't have an account? <a href="register.php">Sign up</a></h6>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>