<?php 
require 'koneksi.php';
if ($_SESSION) {
	$nama = $_SESSION["nama"];
}
else {
	header("Location: login.php");

}
$email=$_SESSION['email'];
$kapalID=$_SESSION['kapalID'];
$jumlah_tiket = $_POST['jumlah_tiket'];
$tgl_pemesanan = $_POST ['tgl_pemesanan'];

//data kapal
$tes= $koneksi->query("SELECT *FROM `kapal` WHERE kapalID = '$kapalID'");
$tos= $tes->fetch_assoc();
$jml_tiket = $tos ['jml_tiket'];


if ($jumlah_tiket > $jml_tiket) {
	echo "
                <script>
                    alert('Jumlah tiket anda pesan melebihi tiket tersedia!');
                    document.location.href = 'caritiket.php';
                </script>
            ";
}else {
	
	// DATA USER
	$data= $koneksi->query("SELECT * FROM `user` WHERE email = '$email'");
	$diri= $data->fetch_assoc();
    $userID = $diri ['userID'];
    $detail= $koneksi->query("SELECT * FROM `detailuser` WHERE userID = '$userID'");
 	$user= $detail->fetch_assoc();
 	$nama= $user ['nama'];
 	$alamat= $user['alamat'];
 	$noTelp= $user['noTelp'];

	//DATA KAPAL
	$pal= $koneksi->query("SELECT * FROM `kapal` WHERE kapalID = '$kapalID'");
 	$row= $pal->fetch_assoc();

    $jenis = $row ['jenis'];
    $waktu = $row ['waktu'];
    $rute = $row ['rute'];
    $nama_dermaga = $row ['nama_dermaga'];
	$harga = $row ['harga'];
	$kapasitas = $row ['kapasitas'];
	$jml_tiket = $row ['jml_tiket'];

    //PERHITUNGAN HARGA TOTAL
    $hargaTot = $jumlah_tiket * $harga; 

	// DAPATKAN BOOKING ID TERAKHIR 
	$pesan= $koneksi->query("SELECT *FROM booking WHERE bookingID IN (SELECT MAX(bookingID) FROM booking)");
 	$pesanan= $pesan->fetch_assoc();
 	$bookingID= $pesanan['bookingID'];

 	// BOOKING ID BARU
	 $bookingID= $bookingID +1;
	 
	

    // SIMPAN DATA
	$koneksi->query("INSERT INTO `booking`(`bookingID`, `kapalID`, `userID`, `tgl_pemesanan`, `waktu`, `rute`, `nama_dermaga`, `jumlah`, `hargaTot`) VALUES ('$bookingID','$kapalID','$userID','$tgl_pemesanan','$waktu','$rute','$nama_dermaga','$jumlah_tiket','$hargaTot')");
	$_SESSION['bookingID']= $bookingID;
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
	 <!-- Required meta tags -->
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bayar.css">
 
 </head>
 <body> 
 <?php include 'layout/navbar.php' ?>
<div class="container">
	<div class="warna">
	<h4 class="text-center">BOOKING</h4>
	<form action="bayar.php" method="POST">
	
	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
		   <label>Nama</label>
             <input type="text" name="nama" class="form-control" readonly value="<?php echo $nama; ?>">
           </div>
		 </div>
	</div>
	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
		   <label>Alamat</label>
             <input type="text" name="alamat" class="form-control" readonly value="<?php echo $alamat; ?>">
           </div>
		 </div>
	</div>
	<div class="row">
        <div class="col-md-6">  
           <div class="form-group">
		   <label>Nomor Seluler</label>
             <input type="number" name="noTelp" class="form-control" readonly value="<?php echo $noTelp; ?>">
           </div>
		 </div>
	</div>
	<hr color="black">
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
             <input type="date" name="tgl_pemesanan" class="form-control" readonly value="<?php echo $tgl_pemesanan; ?>">
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
		   <label>Harga</label>
             <input type="text" name="harga" class="form-control" readonly value="<?php echo $harga; ?>">
           </div>
		 </div>
	
        <div class="col-md-4">  
           <div class="form-group">
		   <label>Jumlah Tiket</label>
             <input type="number" name="jumlah_tiket" class="form-control" readonly min= "1" max="10" value="<?php echo $jumlah_tiket; ?>">
           </div>
		 </div>
		 <div class="col-md-4">  
           <div class="form-group">
		   <label>Total Harga</label>
             <input type="numbar" name="hargaTot" class="form-control" readonly value="<?php echo $hargaTot; ?>">
           </div>
		 </div>
	</div>
	<div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <h6>Metode Pembayaran</h6><br>
              <h6><input type="radio" name="pembayaran" value="OVO" id="OVO">&nbsp;OVO</h6>
              <h6><input type="radio" name="pembayaran" value="Gopay" id="Gopay">&nbsp;Gopay</h6><br>
            </div>
          </div>
		</div>
	<button class="btn btn-primary" name="bayar" value=" <?php  echo $bookingID ?>"> Bayar </button>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="cancel.php?id=<?php echo $bookingID;?> " class="btn btn-primary" class="left" > Cancel </a></right>
	</form>
	</div>
</div> 
<?php include 'layout/footer.php';?>

 </body>
 </html>