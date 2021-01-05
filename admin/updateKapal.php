<?php
require '../function.php';
if ($_SESSION) {
  $nama = $_SESSION["nama"];
}
else 
  header("Location: ../login.php");
  


$kapalID = $_GET["kapalID"];

// query data kapal berdasarkan id
$data = query("SELECT * FROM kapal WHERE kapalID ='$kapalID'")[0];

if (isset($_POST['update'])) {
    if (editKapal($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'datakapal.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'datakapal.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/profil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Kapal</title>
</head>
<body>
<?php include '../layout/sidebar.php' ?>
<div class="container">
<div class="warna">
<h4 class="text-center"><strong>DATA KAPAL</strong></h4>
<form action="" method="POST" enctype="multipart/form-data">


      <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>ID Kapal</label>
              <input type="text" name="kapalID" class="form-control" id="kapalID" required autocomplete="off" readonly value="<?= $data['kapalID']; ?>">
            </div>
          </div>
        </div>
        
      <div class="row">
      <div class="col-md-5">  
        <div class="form-group">
          <label>Jenis Kapal</label>
          <select name="jenis" id = 'jenis' class="form-control">
              <?php
              $query_jns = "SELECT * FROM kapal ORDER BY jenis";
              $sql = mysqli_query($koneksi, $query_jns);
              while ($data_jenis = mysqli_fetch_array($sql)) {
                  if($data['jenis'] == $data_jenis['jenis']){
                      $select = "selected";
                  }else {
                      $select = "";
                  }
                  echo "<option $select>".$data_jenis['jenis']."</option>";
              }
               ?> 
            </select>
            </div>
           </div>
        </div>

        <div class="row">
          <div class="col-md-5">  
            <div class="form-group">
              <label>Waktu Berangkat</label>
              <input type="text" name="waktu" id = "waktu" class="form-control" id="waktu" required autocomplete="off" value="<?= $data['waktu']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">  
            <div class="form-group">
              <label>Rute</label>
              <select name="rute" id="rute" class="form-control">
              <?php
              $query_rt = "SELECT * FROM kapal ORDER BY rute";
              $rsql = mysqli_query($koneksi,$query_rt);
              while ($data_rute = mysqli_fetch_array($rsql)) {
                  if($data['rute'] == $data_rute['rute']){
                      $select = "selected";
                  }else {
                      $select = "";
                  }
                  echo "<option $select>".$data_rute['rute']."</option>";
              }
               ?> 
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-5">  
            <div class="form-group">
              <label>Dermaga Tujuan</label>
              <select name="nama_dermaga" id="nama_dermaga" class="form-control">
              <?php
              $query_nm = "SELECT * FROM kapal ORDER BY nama_dermaga";
              $nmsql = mysqli_query($koneksi,$query_nm);
              while ($data_nama_dermaga = mysqli_fetch_array($nmsql)) {
                  if($data['nama_dermaga'] == $data_nama_dermaga['nama_dermaga']){
                      $select = "selected";
                  }else {
                      $select = "";
                  }
                  echo "<option $select>".$data_nama_dermaga['nama_dermaga']."</option>";
              }
               ?> 
                </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" class="form-control" id = "harga" required autocomplete="off" value="<?= $data['harga']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Kapasitas</label>
              <input type="number" name="kapasitas" class="form-control" id="kapasitas"  required autocomplete="off" value="<?= $data['kapasitas']; ?>">   
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Jumlah tiket</label>
              <input type="number" name="jml_tiket" class="form-control" id="jml_tiket" required autocomplete="off" value="<?= $data['jml_tiket']; ?>">   
            </div>
          </div>
        </div>

        <img src="../foto/<?php echo $data['foto'];?>" width="200">
          <input type="file" name="foto" />
          <br><i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
          <br>
        <button type="submit" name="update" class="btn btn-primary" style="margin-top:10px;">Update</button>
        <a href="datakapal.php" class="btn btn-warning" style="margin-top:10px;">Batal</a></td>
        </form> 
      </div>
    </div>
  </body>
</html>