<?php 
	include 'koneksi.php';
	if ($_SESSION) {
		$nama = $_SESSION["nama"];
	}
	else {
		header("Location: login.php");
	
	}
	// TANGGAL TRANSAKSI
	$tgl_transaksi = date("Y-m-d");

	// AMBIL DATA DARI PROSES SEBELUMNYA
	$metodePembayaran= $_POST['pembayaran'];
	$bookingID= $_SESSION['bookingID'];

	// DATA BOOKING
	$data= $koneksi->query("SELECT * FROM `booking` WHERE bookingID = '$bookingID'");
 	$pesan= $data->fetch_assoc();

 	$userID= $pesan['userID'];
 	$kapalID = $pesan['kapalID'];
    $jumlah_tiket= $pesan['jumlah'];
    $hargaTot = $pesan['hargaTot'];
    $tgl_pemesanan = $pesan['tgl_pemesanan'];

    
    // PERHITUNGAN HARGA TIKET
    $harga= $hargaTot / $jumlah_tiket; 

    // BAYAR
    $bayar= $hargaTot;

	// MEMBUATKAN DETAIL BOOKING
	$koneksi->query("INSERT INTO `detailbooking`(`id_detail_booking`, `booking_ID`, `tgl_transaksi`, `metodePembayaran`, `jumlah_tiket`, `harga`, `harga_Tot`, `bayar`) VALUES ('','$bookingID','$tgl_transaksi','$metodePembayaran','$jumlah_tiket','$harga','$hargaTot','$bayar')");
    // DATA USER
    $detail= $koneksi->query("SELECT * FROM `detailuser` WHERE userID = '$userID'");
 	$user= $detail->fetch_assoc();
 	$nama= $user ['nama'];
 	$noTelp= $user['noTelp'];


    // DATA KAPAL
    $pal= $koneksi->query("SELECT * FROM `kapal` WHERE kapalID = '$kapalID'");
 	$row= $pal->fetch_assoc();

    $jenis = $row ['jenis'];
    $waktu = $row ['waktu'];
    $rute = $row ['rute'];
    $nama_dermaga = $row ['nama_dermaga'];

	// DAPATKAN TIKET ID TERAKHIR 
	$pesanan= $koneksi->query("SELECT *FROM tiket WHERE tiketID IN (SELECT MAX(tiketID) FROM tiket)");
 	$tiket= $pesanan->fetch_assoc();
	 $tiketID= $tiket['tiketID'];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bayar.css">
 	<title>Detail Transaksi</title>
 </head>
 <body>
<?php include 'layout/navbar.php' ?>
	 <div class="container">
		 <div class="warna">
			 <form action="" method="POST">
			 <h4 class="alert alert-primary text-center">Detail Pemesanan Tiket</h4>
			 <div class="row">
				<div class="col-md-5">  
				<div class="form-group">
				<label>Nama</label>
					<input type="text" name="nama" class="form-control" readonly value="<?php echo $nama; ?>">
				</div>
				</div>
			<div class="col-md-5">  
			<div class="form-group">
			<label>Nomor Seluler</label>
				<input type="number" name="noTelp" class="form-control" readonly value="<?php echo $noTelp; ?>">
			</div>
			</div>
		</div>
		<hr color="black">
		<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
		   <label>Nomor Pemesanan</label>
             <input type="number" name="bookingID" class="form-control" readonly value="<?php echo $bookingID; ?>">
           </div>
		 </div>
	</div>
	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
		   <label>Tanggal Transaksi</label>
             <input type="date" name="tgl_transaksi" class="form-control" readonly value="<?php echo $tgl_transaksi; ?>">
           </div>
		 </div>
	</div>
	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
		   <label>Metode Pembayaran</label>
             <input type="text" name="pembayaran" class="form-control" readonly value="<?php echo $metodePembayaran; ?>">
           </div>
		 </div>
	</div>
	<div class="row">
        <div class="col-md-5">  
           <div class="form-group">
		   <label>Jenis Kapal</label>
             <input type="text" name="jenis" class="form-control" readonly value="<?php echo $jenis; ?>">
           </div>
		 </div>
	</div>
	<div class="row"> 
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Tanggal Berangkat</label>
             <input type="date" name="tgl_pemesanan" class="form-control" readonly required="" value="<?php echo $tgl_pemesanan; ?>">
		   </div>
        </div>
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Waktu</label>
             <input type="text" name="waktu" class="form-control" readonly value="<?php echo $waktu; ?>">
           </div>
		 </div>
	</div>
	<div class="row"> 
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Rute</label>
             <input type="text" name="rute" class="form-control" readonly value="<?php echo $rute; ?>">
           </div>
		 </div>
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Dermaga Keberangkatan</label>
             <input type="text" name="nama_dermaga" class="form-control" readonly value="<?php echo $nama_dermaga; ?>">
           </div>
		 </div>
	</div>
	<div class="row"> 
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Harga Tiket</label>
             <input type="text" name="harga" class="form-control" readonly value="<?php echo $harga; ?>">
           </div>
		 </div>
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Jumlah Tiket</label>
             <input type="number" name="jumlah_tiket" class="form-control" readonly required="" min= "1" max="10" value="<?php echo $jumlah_tiket; ?>">
           </div>
		 </div>
		 <div class="col-md-4">  
           <div class="form-group">
		   <label>Total Harga</label>
             <input type="number" name="hargaTot" class="form-control" readonly value="<?php echo $hargaTot; ?>">
           </div>
		 </div>
	</div>
	<h6> TIKET ANDA </h6>
	<h7> Nomor Tiket : </h7>
    <?php 
    	// INPUT DATA TIKET
		for($i=0 ; $i < $jumlah_tiket ; $i++){
 			$tiketID= $tiketID + 1; 
 			$koneksi->query(" INSERT INTO `tiket`(`tiketID`, `bookingID`) VALUES ('$tiketID','$bookingID') ");
     ?>
	<input type="number" name="tiketID" class="form-control" readonly value="<?php echo $tiketID; ?>">
	<?php }?>
	<br>
	<br>
	<a href="caritiket.php" class="btn btn-primary"> KEMBALI KE MENU</a>
	</form>
	</div>
	 </div>  
	 <?php include 'layout/footer.php';?>
 </body>
 </html>