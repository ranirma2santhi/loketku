<?php 
	include 'koneksi.php';
	if ($_SESSION) {
		$nama = $_SESSION["nama"];
	}
	else {
		header("Location: login.php");
	
	}
	//ngambil kapalID
	$kapalID = $_GET['id'];
	$_SESSION['kapalID']=$kapalID;

	
	 	$pal= $koneksi->query("SELECT * FROM `kapal` WHERE kapalID = '$kapalID'");
	 	$row= $pal->fetch_assoc();

        $jenis = $row ['jenis'];
   		$foto = $row ['foto'];
        $waktu = $row ['waktu'];
        $rute = $row ['rute'];
        $nama_dermaga = $row ['nama_dermaga'];
        $harga = $row ['harga'];
        $kapasitas = $row ['kapasitas'];
        $jml_tiket = $row ['jml_tiket'];
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/booking.css">
	<title>booking kapal</title>
</head>
<body>
<?php include 'layout/navbar.php' ?>
<div class="container">
	<div class="warna">
	<h4 class="text-center">BOOKING TIKET KAPAL</h4>

	<br>

	<form action="pembayaran.php" method="POST">
	<h3><img src="foto/<?php echo $foto;?>" width="300" height="160" style="display: block; margin: auto;"></h3>
	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
             <label>Jenis Kapal</label>
             <input type="text" name="jenis" class="form-control" readonly value="<?php echo $jenis; ?>">
           </div>
		 </div>

        <div class="col-md-5">  
           <div class="form-group">
             <label>Waktu</label>
             <input type="text" name="waktu" class="form-control" readonly value="<?php echo $waktu; ?>">
           </div>
		 </div>
	</div>

	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
             <label>Rute Tujuan</label>
             <input type="text" name="rute" class="form-control" readonly value="<?php echo $rute; ?>">
           </div>
		 </div>

        <div class="col-md-5">  
           <div class="form-group">
             <label>Dermaga Keberangkatan</label>
             <input type="text" name="nama_dermaga" class="form-control" disabled value="<?php echo $nama_dermaga; ?>">
           </div>
		 </div>
	</div>

	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
             <label>Harga Tiket</label>
             <input type="text" name="harga" class="form-control" disabled value="Rp. <?php echo number_format($harga); ?>">
           </div>
		 </div>
	</div>

	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
             <label>Tanggal Keberangkatan</label>
             <input type="date" name="tgl_pemesanan" id="tgl_pemesanan" class="form-control"  required  autocomplete="off">
           </div>
		 </div>

        <div class="col-md-5">  
           <div class="form-group">
             <label>Jumlah Tiket</label>
             <input type="number" name="jumlah_tiket" id="jumlah_tiket" min= "1" max="20" class="form-control" placeholder="Masukkan jumlah tiket" min="1" max="10"  required  autocomplete="off">
           </div>
		 </div>
  </div>
	<button type="submit" name="pesan" class="btn btn-primary" style="margin-top:10px;">PESAN</button>

	</form>
	</div>
</div>
<?php include 'layout/footer.php';?>
</body>
</html>