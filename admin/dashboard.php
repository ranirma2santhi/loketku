<?php
    include '../koneksi.php';
    if ($_SESSION) {
        $nama = $_SESSION["nama"];
    }
    else 
        header("Location: ../login.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/yourcode.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<!-- Sidebar -->

<div class="w3-sidebar w3-light-blue w3-bar-block" style="width:15%">

  <h4 class="w3-bar-item" style="color:white;" >WELCOME ADMINISTRATOR</h4>

  <br>
  <a href="#" class="w3-bar-item w3-button">HOME</a>
  <a href="profil_admin.php" class="w3-bar-item w3-button">PROFIL ADMIN</a>
  <a href="data_user.php" class="w3-bar-item w3-button">DATA USER</a>
  <a href="datakapal.php" class="w3-bar-item w3-button">DATA KAPAL</a>
  <a href="databooking.php" class="w3-bar-item w3-button">DATA TRANSAKSI</a>
  <a href="../logout.php" class="w3-bar-item w3-button">LOGOUT</a>
</div>

<!-- Page Content -->
<div style="margin-left:15%">

<div class="w3-container w3-teal">
    
  <h3>DASHBOARD</h3>
  <h4>Halo Admin  <?php echo $nama;?>!</h4>
</div>
<div class="w3-container">
 <!--konten pilihan start-->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">SELAMAT DATANG </h1>
                <h3><p class="lead">Selamat bekerja ! Gunakan sistem ini untuk kepentingan sistem. Tingkatkan Omzet dengan perbanyak posting, share medsos dan advertising</p></h3>
                <p>Tim Support</p>
            </div>
        </div>
    </div>
</div>

</div>
      
</body>
</html>
