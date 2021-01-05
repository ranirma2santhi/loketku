<?php
require  '../function.php';
if ($_SESSION) {
    $nama = $_SESSION["nama"];
}
else 
    header("Location: ../login.php");
$bookingID = $_GET["bookingID"];
$data = query("SELECT `booking_ID`, `tgl_transaksi`, `metodePembayaran`, `jumlah_tiket`, `harga`, `harga_Tot`, `bayar`, `status` FROM detailbooking LEFT JOIN booking ON detailbooking.booking_ID = booking.bookingID WHERE booking_ID = '$bookingID'")[0];
if (isset($_POST['update'])) {
    if (updateBooking($_POST) > 0){
        echo "
                <script>
                    alert('Status diperbarui!');
                    document.location.href = 'databooking.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('Status gagal diperbarui!');
                    document.location.href = 'databooking.php';
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
    <title>Detail Booking User</title> 
    </head>
<body>
    
    <div class="container">
        <div class="warna">
        <h4 class="text-center"><strong>Detail Booking User</strong></h4>
        <form action="" method="POST">

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>ID Booking</label>
              <input type="text" name="booking_ID" class="form-control" id="bookingID" required autocomplete="off" readonly value="<?= $data['booking_ID']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Tanggal transaksi</label>
              <input type="text" name="tgl_transaksi" class="form-control" id="tgl_transaksi" required autocomplete="off" value="<?= $data['tgl_transaksi']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Jumlah Tiket</label>
              <input type="text" name="jumlah_tiket" class="form-control" id="jumlah_tiket" required autocomplete="off" value="<?= $data['jumlah_tiket']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga" class="form-control" id="harga" required autocomplete="off" value="<?= $data['harga']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Total Harga</label>
              <input type="text" name="harga_Tot" class="form-control" id="total_harga" required autocomplete="off"  value="<?= $data['harga_Tot']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Bayar</label>
              <input type="text" name="bayar" class="form-control" id="bayar" required autocomplete="off" value="<?= $data['bayar']; ?>">
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Status</label>
                    <input type="status" name="status" class="form-control" id="status" required autocomplete="off" value="<?= $data['status']; ?>">
                </div>
            </div>
        </div>
        <button type="submit" name="update" class="btn btn-primary" style="margin-top:10px;">Update Status</button>
        <a href="databooking.php" class="btn btn-warning" style="margin-top:10px;">Kembali</a></td>
        </form>
        </div>
    </div>
</body>
</html>
