<?php
include '../koneksi.php';
if ($_SESSION) {
  $nama = $_SESSION["nama"];
}
else {
  header("Location: ../login.php");
}
  
?>
<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/profil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kapal</title>
</head>
<body>
<?php include '../layout/sidebar.php' ?>
<div class="container">
<div class="warna">
<h4 class="text-center"><strong>DATA KAPAL</strong></h4>
<form action="simpankapal.php" method="POST" enctype="multipart/form-data">


      <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>ID Kapal</label>
              <input type="text" name="kapalID" class="form-control" placeholder="Masukkkan ID kapal" required autocomplete="off">
            </div>
          </div>
        </div>
        
      <div class="row">
      <div class="col-md-5">  
        <div class="form-group">
          <label>Jenis Kapal</label>
          <select name="jenis" class="form-control">
                <option value="-"> -Choose- 
                <option value="Roro" > Roro
                <option value="jukung/motor boat">Jukung/Motor Boat
                <option value="fast boat">Fast Boat
                </option>
            </select>
            </div>
           </div>
        </div>

        <div class="row">
          <div class="col-md-5">  
            <div class="form-group">
              <label>Waktu Berangkat</label>
              <select name="waktu" class="form-control">
                    <option value="-"> -Choose- 
                    <option value="08:00" >08:00
                    <option value="10:30">10:30
                    <option value="12:30">12:30
                    <option value="14:00">14:00
                    <option value="16:30">16:30
                    </option>
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">  
            <div class="form-group">
              <label>Rute</label>
              <select name="rute" class="form-control">
                    <option value="-"> -Choose- 
                    <option value="Gili Terawangan" >Gili Terawangan
                    <option value="Nusa Penida">Nusa Penida
                    </option>
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">  
            <div class="form-group">
              <label>Dermaga Tujuan</label>
              <select name="nama_dermaga" class="form-control">
                    <option value="-"> -Choose- 
                    <option value="Sanur Bay">Sanur Bay
                    <option value="Gili Bay" >Gili Bay
                    </option>
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" class="form-control" placeholder="Masukkkan Harga" required autocomplete="off">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Kapasitas</label>
              <input type="number" name="kapasitas" class="form-control" placeholder="Masukkkan Kapasitas" required autocomplete="off">   
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Jumlah tiket</label>
              <input type="number" name="jml_tiket" class="form-control" placeholder="Masukkkan Jumlah tiket" required autocomplete="off">   
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="foto">
            </div>
          </div>
        </div>


        <button type="submit" name="tambah" class="btn btn-primary" style="margin-top:10px;">Tambah</button>
        <a href="dataKapal.php" class="btn btn-warning" style="margin-top:10px;">Batal</a></td>
        </form> 
      </div>
    </div>
  </body>
</html>