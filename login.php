<?php

require 'koneksi.php';
if (isset($_POST["submit"])){

  $email = $_POST["email"];
  $password = mysqli_escape_string($koneksi, $_POST["password"]);
  $password = md5($password);

  $cek = mysqli_query($koneksi, "SELECT nama,email,password,tingkatan_user,alamat,noTelp,jenis_kelamin FROM user LEFT JOIN detailuser USING (userID) WHERE email = '$email'");


  //cek username
  if (mysqli_num_rows($cek ) === 1){
    $row = mysqli_fetch_assoc($cek);
    //cek password
    if ($password == $row["password"]) {

      if($row['tingkatan_user'] == 'admin'){
        $_SESSION['login'] = true;
        $_SESSION['email']=$row["email"];
        $_SESSION['nama']=$row ["nama"];
        $_SESSION['userID']=$row ["userID"];
        $_SESSION['tingkatan_user'] = "admin";
        header("Location:./admin/dashboard.php");
      }elseif($row['tingkatan_user'] == 'user'){
      $_SESSION['login'] = true;
      $_SESSION["email"] = $row["email"];
      $_SESSION["nama"] = $row["nama"];
      $_SESSION["userID"] = $row["userID"];
      $_SESSION['tingkatan_user'] = "user";
      header("Location: index.php");
    }
  }
  }
  $error = true;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/login.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">

    <title>Login - Loketku</title>
  </head>
  <body>
  <?php include 'layout/navbar.php';?>
    <div class="container">
      <div class="warna">
        <h4 class="text-center"><strong>Login ke akun anda</strong></h4>
        <?php if (isset($error)) : ?>
          <p style="color:red; font-style:italic";>Email/Password Salah!</p>
        <?php endif; ?>
        <form action=" " method="post">
        <hr>
            <div class="form-group">
              <label>Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="text" name="email" class="form-control" placeholder="Masukkan Email Anda" autocomplete="off">
              </div>
            </div>

            <div class="form-group">
              <label>Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-lock"></i></div>
                </div>
                <input type="Password" name="password" class="form-control" placeholder="Masukkkan Password Anda">
              </div>
            </div>

            <button type="submit" name= "submit" class="btn btn-primary" style="margin-top:10px;">LOGIN</button>
            <h6><a href="register.php">Belum punya akun?</a></h6>
        </form> 
         
      </div>
    </div>
    <?php include 'layout/footer.php';?>
  </body>
</html>