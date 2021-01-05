<?php
require 'registrasi.php';

if( isset($_POST ["register"]) ) {

  if( registrasi($_POST) > 0 ){
    /*echo "<script> 
          alert ('user baru berhasil ditambahkan!');
          </script>";*/
          
    header("Location: login.php");
  }else{
    echo mysqli_error($koneksi);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/register.css">

    <title>Daftar - Loketku</title>
  </head>
  <body>

    <?php include 'layout/navbar.php' ?>

    <div class="container">
      <div class="warna">
        <h4 class="alert alert-primary text-center">Buat Akun Baru</h4>
        <form action="" method="post">
        <div class="row">
          <div class="col-md-10">  
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda" required  autocomplete="off">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">  
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Masukkkan Email Anda" required autocomplete="off">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">  
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukkkan Alamat Anda" required autocomplete="off">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">  
            <div class="form-group">
              <label>Nomor Seluler</label>
              <input type="number" name="noTelp" class="form-control" placeholder="Masukkkan Nomor Seluler Anda" required autocomplete="off">   
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label>Jenis Kelamin</label><br>
              <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki&nbsp;&nbsp;
              <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">  
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkkan Password Anda" required autocomplete="off">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">  
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="konpasswd" class="form-control" placeholder="Konfirmasi Password Anda" required autocomplete="off">
            </div>
          </div>
        </div>

        <button type="submit" name="register" class="btn btn-primary" style="margin-top:10px;">DAFTAR</button>
        </form> 
      </div>
    </div>
    <?php include 'layout/footer.php'; ?>
  </body>
</html>