<?php

include "config/role_controller.php";
include "config/user_controller.php";

$data_role = get_all_role();

// mengecek apakah tombol sign up sudah ditekan
if (isset($_POST['register'])) {
  if (register_user($_POST) > 0) {
    header("location: login.php?location=index.php");
    exit;
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
    <div class="container register">
      <h1>Sign Up</h1>
      <h5>Create your account</h5>
      <form action="" method="POST">
        <div class="mb-3">
          <label for="inputUsername" class="form-label">Username</label>
          <input type="text" id="inputUsername" name="username" placeholder="Username" required>
          <?php
          if (isset($_GET['message'])) {
              if ($_GET['message'] == 'username_terpakai') {
                  echo "<div class='invalid-username'>
                  Username already exists.
                  </div>";
              }
          }
          ?>
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password" id="inputPassword" name="password" placeholder="Password" required minlength="8">
        </div>
        <div class="mb-3">
          <label for="inputRole" class="form-label">Role</label>
          <select name="id_role" aria-label="select role">
            <option selected>Pilih role</option>
            <?php foreach($data_role as $role) : ?>
            <option value="<?=$role['id']?>"><?=$role['nama_role']?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" name="register">Sign Up</button>
      </form>
      <h6>Already have an account? <a href="login.php">Sign in</a></h6>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>