<?php
require 'function.php';

$email = $_SESSION['email'];
$nama = $_SESSION['nama'];


$query = mysqli_query($koneksi, "SELECT nama, email, alamat,noTelp, jenis_kelamin, password FROM user INNER JOIN detailuser ON detailuser.userID = user.userID WHERE email = '$email'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['edit_user'])) {
    if (edit($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/profil.css">
    <title>Profil Saya</title>
</head>
<body>
<?php include 'layout/navbar.php' ?>
    <div class="container">
    <div class="warna">
    <h4 class="text-center"><strong>MY PROFILE</strong></h4>
    <h6  class="text-center" style="color:burlywood; font-style:italic";>Loketku Says Hello!</h6>
    <form action="" id="edit" method="POST">

    <div class="row>">
        <div class="col-md-10">  
            <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['nama']; ?> " required autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row>">
        <div class="col-md-10">  
            <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" id="email" readonly value="<?=$user['email'];?>">
            </div>
        </div>
    </div>

    <div class="row>">
        <div class="col-md-10">  
            <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="<?=$user['alamat'];?>"required autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row>">
        <div class="col-md-6">
            <div class="form-group">    
            <label>Nomor Seluler</label>
            <input type="number" name="noTelp" class="form-control" id="noTelp" value="<?=$user['noTelp'];?>"required autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row>">
        <div class="col-md-6">
            <div class="form-group">    
            <label>Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" readonly value="<?=$user['jenis_kelamin'];?>">
            </div>
        </div>
    </div>

    <div class="row>">
        <div class="col-md-6">
            <div class="form-group">    
            <label>Password</label>
            <input type="password" name="password" class="form-control" id="password" value="<?=$user['password'];?>"required autocomplete="off">
            </div>
        </div>
    </div>

    <input type="submit" name="edit_user" id="edit" class="btn btn-primary ml-4 mb -3" value="Edit Profil">
    &nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-primary">Batal</a></td>

</div>
</form>
</div>
</div>
<?php include 'layout/footer.php'; ?>
</body>
</html>